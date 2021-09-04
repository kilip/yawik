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

namespace Yawik\Applicant\Model;

/**
 * Holds various attributes like "send me a carbon copy" or
 * "I accept the privacy policy".
 *
 * @author Mathias Gelhausen <gelhausen@cross-solution.de>
 * @author Carsten Bleek <bleek@cross-solution.de>
 */
class Attributes
{
    /**
     * Flag whether privacy policy is accepted or not.
     */
    protected bool $privacyPolicyAccepted = false;

    /**
     * Flag whether to send a carbon copy or not.
     */
    protected bool $sendCarbonCopy = false;

    public function isPrivacyPolicyAccepted(): bool
    {
        return $this->privacyPolicyAccepted;
    }

    public function setPrivacyPolicyAccepted(bool $privacyPolicyAccepted): void
    {
        $this->privacyPolicyAccepted = $privacyPolicyAccepted;
    }

    public function isSendCarbonCopy(): bool
    {
        return $this->sendCarbonCopy;
    }

    public function setSendCarbonCopy(bool $sendCarbonCopy): void
    {
        $this->sendCarbonCopy = $sendCarbonCopy;
    }
}
