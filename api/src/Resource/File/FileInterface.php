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
use Yawik\Resource\File\FileMetadataInterface;
use Yawik\Resource\Model\ResourceInterface;

/**
 * Interface FileMetadataInterface.
 *
 * @author Anthonius Munthi
 *
 * @since 0.36
 */
interface FileInterface extends ResourceInterface
{
    public function getName(): ?string;

    public function getChunkSize(): ?int;

    public function getLength(): ?int;

    public function getUploadDate(): ?DateTimeInterface;

    //public function getUri(): string;

    public function getPrettySize(): string;

    /**
     * @return FileMetadataInterface|object
     */
    public function getMetadata();
}
