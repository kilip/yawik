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
use Yawik\Resource\Model\ResourceTrait;

trait FileTrait
{
    /**
     * @ODM\Id
     */
    protected string $id;

    /**
     * @ODM\File\Filename
     */
    protected ?string $name = null;

    /**
     * @ODM\File\UploadDate(type="tz_date")
     */
    protected ?DateTimeInterface $uploadDate = null;

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
    protected ?FileMetadataInterface $metadata = null;

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @return \Yawik\User\Model\Image
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getUploadDate(): ?DateTimeInterface
    {
        return $this->uploadDate;
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

    /**
     * @return FileMetadataInterface|null
     */
    public function getMetadata(): ?FileMetadataInterface
    {
        return $this->metadata;
    }

    /**
     * @param FileMetadataInterface|null $metadata
     */
    public function setMetadata(?FileMetadataInterface $metadata): void
    {
        $this->metadata = $metadata;
    }
}
