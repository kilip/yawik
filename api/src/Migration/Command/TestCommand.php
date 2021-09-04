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

namespace Yawik\Migration\Command;

use Doctrine\ODM\MongoDB\DocumentManager;
use MongoDB\BSON\ObjectId;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Yawik\Organization\Model\Organization;

class TestCommand extends Command
{
    private DocumentManager $manager;

    public function __construct(
        DocumentManager $manager
    ) {
        $this->manager = $manager;
        parent::__construct('yawik:migrate:test');
    }

    /**
     * @return int
     * @psalm-suppress MixedArrayAccess
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $manager = $this->manager;

        $db  = $manager->getDocumentDatabase(Organization::class);
        $col = $db->selectCollection('organizations');

        foreach ($col->find() as $doc) {
            $col->updateOne(['_id' => $doc['_id']], [
                '$set' => [
                    'template._id' => new ObjectId(),
                ],
            ]);
        }

        return Command::SUCCESS;
    }
}
