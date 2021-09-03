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

namespace Yawik\Resource\Model;

use Yawik\Resource\File\FileMetadata;

class ImageCacheMetadata extends FileMetadata
{
    protected string $path;
    protected string $filter;

    public function __construct(string $path, string $filter)
    {
        $this->path   = $path;
        $this->filter = $filter;
    }

    public function getPath(): string
    {
        return $this->path;
    }

    public function setPath(string $path): void
    {
        $this->path = $path;
    }

    public function getFilter(): string
    {
        return $this->filter;
    }

    public function setFilter(string $filter): void
    {
        $this->filter = $filter;
    }
}
