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

namespace Yawik\Resource\File;

use DateTimeInterface;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

trait FileTrait
{
    /**
     * @ODM\Id
     */
    protected string $id;

    /**
     * @ODM\File\Filename
     */
    protected ?string $filename = null;

    /**
     * @ODM\File\UploadDate(type="tz_date")
     */
    protected DateTimeInterface $uploadDate;

    /**
     * @ODM\File\Length
     */
    protected ?int $length = null;

    /**
     * @ODM\File\ChunkSize
     */
    protected ?int $chunkSize = null;

    /**
     * @ODM\EmbedOne(targetDocument="Yawik\Resource\File\FileMetadataInterface")
     */
    protected FileMetadataInterface $metadata;

    public function getId(): string
    {
        return $this->id;
    }

    public function getUploadDate(): DateTimeInterface
    {
        return $this->uploadDate;
    }

    public function setUploadDate(DateTimeInterface $uploadDate): void
    {
        $this->uploadDate = $uploadDate;
    }

    public function getFilename(): ?string
    {
        return $this->filename;
    }

    public function setFilename(?string $filename): void
    {
        $this->filename = $filename;
    }

    public function getLength(): ?int
    {
        return $this->length;
    }

    public function getChunkSize(): ?int
    {
        return $this->chunkSize;
    }

    /**
     * Gets the length of file in GB, MB ot kB format.
     */
    public function getPrettySize(): string
    {
        $size = $this->getLength();

        if ($size >= 1073741824) {
            return round($size / 1073741824, 2).' GB';
        }

        if ($size >= 1048576) {
            return round($size / 1048576, 2).' MB';
        }

        if ($size >= 1024) {
            return round($size / 1024, 2).' kB';
        }

        return (string) $size;
    }

    public function getMetadata(): FileMetadataInterface
    {
        return $this->metadata;
    }

    public function setMetadata(FileMetadataInterface $metadata): void
    {
        $this->metadata = $metadata;
    }
}
