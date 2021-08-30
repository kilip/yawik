<?php

namespace Yawik\Component\Resource\Model;

interface StatusInterface
{
    const CREATED = 'created';
    const WAITING_FOR_APPROVAL = 'waiting for approval';
    const REJECTED = 'rejected';
    const PUBLISH = 'publish';
    const ACTIVE = 'active';
    const INACTIVE = 'inactive';
    const EXPIRED = 'expired';
}
