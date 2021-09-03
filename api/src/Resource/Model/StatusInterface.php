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

interface StatusInterface
{
    /**
     * A new job was created.
     */
    public const CREATED =  /*@translate*/ 'created';

    /**
     * A new job is waiting for approval.
     */
    public const WAITING_FOR_APPROVAL = /*@translate*/ 'waiting for approval';

    /**
     * A job was rejected to be published.
     */
    public const REJECTED = /*@translate*/ 'rejected';

    /**
     * A Job is accepted an is going to be published.
     */
    public const PUBLISH  = /*@translate*/ 'publish';

    /**
     * A Job is online.
     */
    public const ACTIVE  = /*@translate*/ 'active';

    /**
     * A job was is set inactive.
     */
    public const INACTIVE = /*@translate*/ 'inactive';

    /**
     * A job was expired.
     */
    public const EXPIRED  = /*@translate*/ 'expired';

    public function getState(): string;

    public function is(string $state): bool;

    /**
     * Gets the Name of the job state.
     */
    public function getStates(): array;

    /**
     * Gets an integer of the job state.
     */
    public function getOrder(): array;
}
