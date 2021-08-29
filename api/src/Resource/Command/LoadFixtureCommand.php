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

namespace Yawik\Resource\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Yawik\Resource\Fixtures\FixtureLoader;

class LoadFixtureCommand extends Command
{
    private FixtureLoader $loader;

    public function __construct(
        FixtureLoader $loader
    ) {
        parent::__construct('yawik:fixtures:load');
        $this->loader = $loader;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $loader   = $this->loader;
        $loader->load();

        return Command::SUCCESS;
    }
}
