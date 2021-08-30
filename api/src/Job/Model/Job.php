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

namespace Yawik\Job\Model;

use Symfony\Component\Serializer\Annotation\Groups;
use Yawik\Organization\Model\Company;
use Yawik\Resource\Contracts\ResourceInterface;
use Yawik\Resource\Contracts\ResourceTrait;

class Job implements ResourceInterface
{
    use ResourceTrait;

    /**
     * @Groups({"read", "write"})
     */
    private string $title;

    private Company $company;

    private string $contactEmail;

    private string $language;

    private string $link;

    private \DateTimeInterface $datePublishStart;

    private \DateTimeInterface $datePublishEnd;

    private bool $termsAccepted;

    private string $reference;

    public function getLanguage(): string
    {
        return $this->language;
    }

    public function setLanguage(string $language): void
    {
        $this->language = $language;
    }

    public function getLink(): string
    {
        return $this->link;
    }

    public function setLink(string $link): void
    {
        $this->link = $link;
    }

    public function getDatePublishStart(): \DateTimeInterface
    {
        return $this->datePublishStart;
    }

    public function setDatePublishStart(\DateTimeInterface $datePublishStart): void
    {
        if ($datePublishStart instanceof \DateTime) {
            $datePublishStart = \DateTimeImmutable::createFromMutable($datePublishStart);
        }
        $this->datePublishStart = $datePublishStart;
    }

    public function getDatePublishEnd(): \DateTimeInterface
    {
        return $this->datePublishEnd;
    }

    public function setDatePublishEnd(\DateTimeInterface $datePublishEnd): void
    {
        if ($datePublishEnd instanceof \DateTime) {
            $datePublishEnd = \DateTimeImmutable::createFromMutable($datePublishEnd);
        }
        $this->datePublishEnd = $datePublishEnd;
    }

    public function isTermsAccepted(): bool
    {
        return $this->termsAccepted;
    }

    public function setTermsAccepted(bool $termsAccepted): void
    {
        $this->termsAccepted = $termsAccepted;
    }

    public function getReference(): string
    {
        return $this->reference;
    }

    public function setReference(string $reference): void
    {
        $this->reference = $reference;
    }

    public function getContactEmail(): string
    {
        return $this->contactEmail;
    }

    public function setContactEmail(string $contactEmail): void
    {
        $this->contactEmail = $contactEmail;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getCompany(): Company
    {
        return $this->company;
    }

    public function setCompany(Company $company): void
    {
        $this->company = $company;
    }
}
