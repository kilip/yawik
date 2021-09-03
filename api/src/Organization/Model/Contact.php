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

namespace Yawik\Organization\Model;

class Contact
{
    /**
     * BuildingNumber of an organization address.
     *
     * @var string
     * @ODM\Field(type="string") */
    protected ?string $number = null;

    /**
     * Postalcode of an organization address.
     *
     * @var string
     * @ODM\Field(type="string") */
    protected ?string $postalCode = null;

    /**
     * Cityname of an organization address.
     *
     * @var string
     * @ODM\Field(type="string") */
    protected ?string $city = null;

    /**
     * Streetname of an organization address.
     *
     * @var string
     * @ODM\Field(type="string") */
    protected ?string $street = null;

    /**
     * Phone number of an organization address.
     *
     * @var string
     * @ODM\Field(type="string") */
    protected ?string $phone = null;

    /**
     * country of an organization address.
     *
     * @var string
     * @ODM\Field(type="string") */
    protected ?string $country = null;

    /**
     * Fax number of an organization address.
     *
     * @var string
     * @ODM\Field(type="string") */
    protected ?string $fax = null;

    /**
     * The website of the organization.
     *
     * @ODM\Field
     *
     * @var string
     */
    protected ?string $website = null;

    /**
     * @return string
     */
    public function getNumber(): ?string
    {
        return $this->number;
    }

    /**
     * @param string $number
     */
    public function setNumber(?string $number): void
    {
        $this->number = $number;
    }

    /**
     * @return string
     */
    public function getPostalCode(): ?string
    {
        return $this->postalCode;
    }

    /**
     * @param string $postalCode
     */
    public function setPostalCode(?string $postalCode): void
    {
        $this->postalCode = $postalCode;
    }

    /**
     * @return string
     */
    public function getCity(): ?string
    {
        return $this->city;
    }

    /**
     * @param string $city
     */
    public function setCity(?string $city): void
    {
        $this->city = $city;
    }

    /**
     * @return string
     */
    public function getStreet(): ?string
    {
        return $this->street;
    }

    /**
     * @param string $street
     */
    public function setStreet(?string $street): void
    {
        $this->street = $street;
    }

    /**
     * @return string
     */
    public function getPhone(): ?string
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     */
    public function setPhone(?string $phone): void
    {
        $this->phone = $phone;
    }

    /**
     * @return string
     */
    public function getCountry(): ?string
    {
        return $this->country;
    }

    /**
     * @param string $country
     */
    public function setCountry(?string $country): void
    {
        $this->country = $country;
    }

    /**
     * @return string
     */
    public function getFax(): ?string
    {
        return $this->fax;
    }

    /**
     * @param string $fax
     */
    public function setFax(?string $fax): void
    {
        $this->fax = $fax;
    }

    /**
     * @return string
     */
    public function getWebsite(): ?string
    {
        return $this->website;
    }

    /**
     * @param string $website
     */
    public function setWebsite(?string $website): void
    {
        $this->website = $website;
    }
}
