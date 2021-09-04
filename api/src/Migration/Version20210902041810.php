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
use MongoDB\BSON\ObjectId;
use MongoDB\BSON\UTCDateTime;
use MongoDB\Database;

/**
 * @psalm-suppress PossiblyInvalidArrayAccess,MixedAssignment,PossiblyNullArrayAccess
 * @psalm-suppress MixedArgumentTypeCoercion
 * @psalm-suppress MixedArgument
 * @psalm-suppress PossiblyInvalidArgument
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

    /**
     * @return void
     */
    public function up(Database $db)
    {
        $this->upgradeFileMetadata($db);
        $this->updateCollectionNames($db);
        $this->upgradeOrganizations($db);
        $this->upgradeOrganizationsImage($db);
        $this->removeOrganizationsNames($db);
        $this->upgradeUsers($db);
        $this->upgradeJobs($db);
        $this->upgradeApplicants($db);
    }

    /**
     * It can not be downgraded.
     */
    public function down(Database $db): void
    {
        throw new \Exception('Can not downgrade this upgrade');
    }

    private function upgradeFileMetadata(Database $db): void
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
                    'belongsTo' => 'metadata.belongsTo',
                    'key' => 'metadata.key',
                ],
            ]);
            $collection->updateMany([], [
                '$unset' => [
                    'name' => '',
                ],
            ]);
        }
    }

    private function updateCollectionNames(Database $db): void
    {
        $renamedMaps = [
            'applications' => 'applicants',
            'applications.chunks' => 'applicants.attachments.chunks',
            'applications.files' => 'applicants.attachments.files',
            'cvs' => 'resume',
            'cvs.attachments.files' => 'resume.attachments.files',
            'cvs.attachments.chunks' => 'resume.attachments.chunks',
            'cvs.contact.images.files' => 'resume.contact.images.files',
            'cvs.contact.images.chunks' => 'resume.contact.images.chunks',
            'organizations.names' => 'organizations.ranks',
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

    private function upgradeUsers(Database $db): void
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

    private function upgradeJobs(Database $db): void
    {
        $col = $db->selectCollection('jobs');

        // rename fields
        $col->updateMany([], [
            '$rename' => [
                'isDraft' => 'draft',
                'isDeleted' => 'deleted',
                'user' => 'owner',
            ],
        ]);

        // update job collections
        $filter = [
            '$or' => [
                ['locations.postalcode' => ['$exists' => true]],
                ['locations.streetnumber' => ['$exists' => true]],
                ['locations.streetname' => ['$exists' => true]],
            ],
        ];
        $col->updateMany($filter, [
            [
                '$set' => [
                    'locations' => [
                        '$map' => [
                            'input' => '$locations',
                            'as' => 'locations',
                            'in' => [
                                'streetName' => '$$locations.streetname',
                                'streetNumber' => '$$locations.streetnumber',
                                'city' => '$$locations.city',
                                'region' => '$$locations.region',
                                'postalCode' => '$$locations.postalcode',
                                'country' => '$$locations.country',
                                'coordinates' => '$$locations.coordinates',
                            ],
                        ],
                    ],
                ],
            ],
        ]);

        // fixing status columns
        $filter = [
            '"status.state"' => ['$exists' => false],
        ];
        $col->updateMany($filter, [
            '$rename' => [
                'status.name' => 'status.state',
            ],
        ]);
        $col->updateMany([], [
            [
                '$unset' => ['status.name'],
            ],
        ]);
    }

    private function upgradeOrganizations(Database $db): void
    {
        $col = $db->selectCollection('organizations');
        $col->updateMany([], [
            '$rename' => [
                'contact.houseNumber' => 'contact.number',
                'contact.postalcode' => 'contact.postalCode',
                'isDraft' => 'draft',
                'user' => 'owner',
                '_organizationName' => 'name',
                'organizationName' => 'organizationRank',
                //'number' => 'contact.number',
            ],
        ]);
        foreach ($col->find() as $doc) {
            $col->updateOne(['_id' => $doc['_id']], [
                '$set' => [
                    'template._id' => new ObjectId(),
                ],
            ]);
        }
    }

    /**
     * - Remove all thumbnail images from db
     * - Stores original image only in db.
     *
     * @psalm-suppress MixedArrayAccess
     */
    private function upgradeOrganizationsImage(Database $db): void
    {
        $col    = $db->selectCollection('organizations.images.files');
        $filter = [
            'metadata.key' => 'original',
        ];

        /** @var array $image */
        foreach ($col->find($filter) as $image) {
            $imageSetId = (string) $image['metadata']['belongsTo'];
            $org        = $db->selectCollection('organizations');
            $filter     = ['images.id' => $imageSetId];
            $org->updateMany($filter, [
                '$set' => [
                    'image' => $image['_id'],
                ],
            ]);
            $col->deleteMany([
                'metadata.key' => 'thumbnail',
                'metadata.belongsTo' => $imageSetId,
            ]);
        }
        $col->updateMany([], [
            '$unset' => [
                'metadata.key' => '',
                'metadata.belongsTo' => '',
            ],
        ]);

        // remove all images fields from organizations
        $db->selectCollection('organizations')
            ->updateMany([], [
                '$unset' => [
                    'images' => '',
                ],
            ]);
    }

    /**
     * Remove organizations.names collection,
     * embed the values into organizations.rank.
     */
    private function removeOrganizationsNames(Database $db): void
    {
        $col = $db->selectCollection('organizations');
        foreach ($col->find(['organizationRank' => ['$exists' => true]]) as $org) {
            $rankId    = $org['organizationRank'];
            $rankCol   = $db->selectCollection('organizations.ranks');
            $rank      = $rankCol->findOne(['_id' => $rankId]);
            $embedRank = [
                'id' => new ObjectId(),
                'rankingByCompany' => $rank['rankingByCompany'],
                'ranking' => $rank['ranking'],
            ];
            $col->updateOne(['_id' => $org['_id']], [
                '$set' => [
                    'name' => $rank['name'],
                    'rank' => $embedRank,
                ],
            ]);
        }
        $col->updateMany([], [
            '$unset' => [
                'organizationRank' => '',
            ],
        ]);
        $db->dropCollection('organizations.ranks');
    }

    private function upgradeApplicants(Database $db): void
    {
        $col = $db->selectCollection('applicants');

        $col->updateMany([], [
            '$rename' => [
                'isDraft' => 'draft',
            ],
        ]);
    }
}
