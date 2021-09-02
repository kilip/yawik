<?php

namespace Yawik\Migration;

use AntiMattr\MongoDB\Migrations\AbstractMigration;
use Doctrine\Common\EventManager;
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
        return "Upgrade Yawik Database";
    }

    public function up(Database $db)
    {
        $this->upgradeFileMetadata($db);
        $this->updateCollectionNames($db);
    }

    public function down(Database $db)
    {
        throw new \Exception("Can not downgrade this upgrade");

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

        foreach($collectionNames as $name){
            $collection = $db->selectCollection($name);
            $collection->updateMany([], [
                '$rename' => [
                    'filename' => 'name',
                    'permissions' => 'metadata.permissions',
                    'md5' => 'metadata.md5',
                    'dateUploaded' => 'metadata.dateUploaded',
                    'user' => 'metadata.owner',
                    'mimetype' => 'metadata.contentType'
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
        $names = [];
        foreach($collections as $collection){
            $names[] = $collection->getName();
        }

        foreach($renamedMaps as $from => $to){
            if(in_array($from, $names)){
                $admin->command([
                    'renameCollection' => $db->getDatabaseName().'.'.$from,
                    'to' => $db->getDatabaseName().'.'.$to
                ]);
            }

        }
    }
}
