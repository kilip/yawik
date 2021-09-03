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

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Yawik\User\Model\UserInterface;

/**
 * @ODM\EmbeddedDocument
 */
class FileMetadata implements FileMetadataInterface
{
    /**
     * @ODM\Field(type="tz_date")
     */
    protected ?\DateTimeInterface $dateUploaded = null;

    /**
     * @ODM\Field(type="string", nullable=true)
     */
    protected string $contentType;

    /**
     * owner of an attachment. Typically this is the candidate who applies for a job offer.
     *
     * @ODM\ReferenceOne(targetDocument="Yawik\User\Model\UserInterface", storeAs="id", cascade={"persist"})
     */
    protected ?UserInterface $owner = null;

    /**
     * @ODM\Field(type="string", nullable=true)
     */
    protected ?string $md5 = null;

    /**
     * @ODM\EmbedOne(targetDocument="Core\Entity\Permissions")
     */
    // @TODO: handle permissions
    // protected ?PermissionsInterface $permissions = null;

    /**
     * @ODM\Field(type="string", nullable=true)
     */
    protected ?string $name = null;

    public function getContentType(): string
    {
        return $this->contentType;
    }

    public function setContentType(string $contentType): void
    {
        $this->contentType = $contentType;
    }

    public function getOwner(): ?UserInterface
    {
        return $this->owner;
    }

    public function setOwner(?UserInterface $owner): void
    {
        $this->owner = $owner;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    public function getDateUploaded(): ?\DateTimeInterface
    {
        return $this->dateUploaded;
    }

    public function setDateUploaded(?\DateTimeInterface $dateUploaded): void
    {
        $this->dateUploaded = $dateUploaded;
    }

    public function getMd5(): ?string
    {
        return $this->md5;
    }

    public function setMd5(?string $md5): void
    {
        $this->md5 = $md5;
    }
}
