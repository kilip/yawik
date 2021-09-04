<?php

namespace Yawik\Applicant\Model;

use Yawik\Resource\Model\SortableStatus;

class Status extends SortableStatus
{
    public function getOrder(): array
    {
        return [];
    }
}
