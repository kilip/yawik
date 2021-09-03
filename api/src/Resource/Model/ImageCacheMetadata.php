<?php

namespace Yawik\Resource\Model;

use Yawik\Resource\File\FileMetadata;
use Yawik\Resource\File\FileMetadataInterface;

class ImageCacheMetadata extends FileMetadata
{
    protected string $path;
    protected string $filter;

    public function __construct(string $path, string $filter)
    {
        $this->path = $path;
        $this->filter = $filter;
    }

    /**
     * @return string
     */
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * @param string $path
     */
    public function setPath(string $path): void
    {
        $this->path = $path;
    }

    /**
     * @return string
     */
    public function getFilter(): string
    {
        return $this->filter;
    }

    /**
     * @param string $filter
     */
    public function setFilter(string $filter): void
    {
        $this->filter = $filter;
    }
}
