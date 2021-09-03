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

use Yawik\User\Model\UserInterface;

/**
 * Interface FileMetadataInterface.
 *
 * @author Anthonius Munthi
 *
 * @since 0.36
 */
interface FileMetadataInterface
{
    public function getName(): ?string;

    public function setOwner(?UserInterface $owner): void;

    public function getOwner(): ?UserInterface;

    // @TODO: handle file permissions
    // public function setPermissions(PermissionsInterface $permissions);

    // public function getPermissions(): ?PermissionsInterface;

    public function setContentType(string $contentType): void;

    public function getContentType(): string;
}
