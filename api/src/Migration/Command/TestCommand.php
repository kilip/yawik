<?php

namespace Yawik\Migration\Command;

use Doctrine\ODM\MongoDB\DocumentManager;
use MongoDB\BSON\ObjectId;
use MongoDB\Driver\Query;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Yawik\Job\Model\Job;
use Yawik\Organization\Model\Organization;

class TestCommand extends Command
{
    private DocumentManager $manager;

    public function __construct(
        DocumentManager $manager
    )
    {
        $this->manager = $manager;
        parent::__construct('yawik:migrate:test');
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int
     * @psalm-suppress MixedArrayAccess
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $manager = $this->manager;

        $db = $manager->getDocumentDatabase(Organization::class);
        $db->selectCollection('organizations')
            ->updateMany([], [
                '$unset' => [
                    'images' => ''
                ]
            ]);

        return Command::SUCCESS;
    }
}
