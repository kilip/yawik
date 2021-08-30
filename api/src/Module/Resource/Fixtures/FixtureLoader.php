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

namespace Yawik\Module\Resource\Fixtures;

use Fidry\AliceDataFixtures\LoaderInterface;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Finder\SplFileInfo;

class FixtureLoader
{
    private LoaderInterface $loader;
    private string $fixturesDir;

    public function __construct(
        LoaderInterface $loader,
        string $fixturesDir
    ) {
        $this->loader      = $loader;
        $this->fixturesDir = $fixturesDir;
    }

    public function load(): void
    {
        $loader      = $this->loader;
        $files       = $this->getFiles();
        $loader->load($files);
    }

    /**
     * @psalm-return array<array-key,string>
     */
    private function getFiles(): array
    {
        $finder = Finder::create()
            ->in($this->fixturesDir)
            ->name('*.yaml');
        $files = [];

        /** @var SplFileInfo $file */
        foreach ($finder->files() as $file) {
            $files[] = $file->getRealPath();
        }

        return $files;
    }
}
