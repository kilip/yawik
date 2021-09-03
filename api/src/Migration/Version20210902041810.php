<?php

/*
 * This file is part of the Yawik project.
 *
 * (c) 2013-2021 Cross Solution
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Yawik\Migration;

use AntiMattr\MongoDB\Migrations\AbstractMigration;
use MongoDB\BSON\UTCDateTime;
use MongoDB\Database;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20210902041810 extends AbstractMigration
{
    /**
     * @return string
     */
    public function getDescription()
    {
        return 'Upgrade Yawik Database';
    }

    public function up(Database $db)
    {
        $this->upgradeFileMetadata($db);
        $this->updateCollectionNames($db);
        $this->upgradeUsers($db);
    }

    public function down(Database $db)
    {
        throw new \Exception('Can not downgrade this upgrade');
    }

    private function upgradeFileMetadata(Database $db)
    {
        $collectionNames = [
            'applications.files',
            'cvs.attachments.files',
            'cvs.contact.images.files',
            'organizations.images.files',
            'users.images.files',
        ];

        foreach ($collectionNames as $name) {
            $collection = $db->selectCollection($name);
            $collection->updateMany([], [
                '$rename' => [
                    'name' => 'filename',
                    'permissions' => 'metadata.permissions',
                    'md5' => 'metadata.md5',
                    'dateUploaded' => 'metadata.dateUploaded',
                    'user' => 'metadata.owner',
                    'mimetype' => 'metadata.contentType',
                ]
            ]);
            $collection->updateMany([],[
                '$unset' => [
                    'name' => ''
                ]
            ]);
        }
    }

    private function updateCollectionNames(Database $db)
    {
        $renamedMaps = [
            'applications' => 'applicant',
            'applications.chunks' => 'applicant.chunks',
            'applications.files' => 'applicant.files',
            'cvs' => 'resume',
            'cvs.attachments.files' => 'resume.attachments.files',
            'cvs.attachments.chunks' => 'resume.attachments.chunks',
            'cvs.contact.images.files' => 'resume.contact.images.files',
            'cvs.contact.images.chunks' => 'resume.contact.images.chunks',
        ];
        $admin = new Database(
            $db->getManager(), // Our \Doctrine\MongoDB\Connection
            'admin',
            []
        );

        $collections = $db->listCollections([]);
        $names       = [];
        foreach ($collections as $collection) {
            $names[] = $collection->getName();
        }

        foreach ($renamedMaps as $from => $to) {
            if (\in_array($from, $names, true)) {
                $admin->command([
                    'renameCollection' => $db->getDatabaseName().'.'.$from,
                    'to' => $db->getDatabaseName().'.'.$to,
                ]);
            }
        }
    }

    private function upgradeUsers(Database $db)
    {
        $col = $db->selectCollection('users');
        $col->updateMany([], [
            '$rename' => [
                'profile' => 'socialProfile',
            ],
        ]);
        $col->updateMany([], [
            '$rename' => [
                'isDraft' => 'draft',
                'profiles' => 'socialProfiles',
                'info' => 'profile',
                'credential' => 'password',
                'login' => 'username',
            ],
        ]);

        foreach ($col->find([]) as $document) {
            if (\array_key_exists('profile', $document)) {
                $profile = $document['profile'];
                if (\array_key_exists('birthDay', $profile)) {
                    $str = implode('-', [$profile['birthYear'], $profile['birthMonth'], $profile['birthDay']]);
                    $dob = \DateTime::createFromFormat('Y-m-d', $str);
                    $col->updateOne(['_id' => $document['_id']], [
                        '$set' => [
                            'profile.dob' => new UTCDateTime($dob->getTimestamp() * 1000),
                        ],
                        '$unset' => [
                            'profile.birthDay' => '',
                            'profile.birthMonth' => '',
                            'profile.birthYear' => '',
                        ],
                    ]);
                }
            }
        }

        // remove unused birth info
        $col->updateMany([], [
            '$rename' => [
                'profile.dob' => 'profile.birthday',
            ],
        ]);
    }
}
