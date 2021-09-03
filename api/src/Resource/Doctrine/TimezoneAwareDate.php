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

namespace Yawik\Resource\Doctrine;

use Doctrine\ODM\MongoDB\Types\Type;
use MongoDB\BSON\UTCDateTime;

/**
 * This is a mapping type for DoctrineMongoODM.
 *
 * It will convert \DateTime objects to an array representation
 * with a UTCDateTime object and the Timezone.
 *
 * This works around the fact, that UTCDateTime is NOT
 * timezone aware.
 *
 * @version 1.1
 *
 * @author Mathias Gelhausen <gelhausen@cross-solution.de>
 */
class TimezoneAwareDate extends Type
{
    /**
     * Converts a \DateTime object to MongoDB representation.
     *
     * If <code>$value</code> is <i>NULL</i> (or not a \DateTime object),
     * nothing is done and <i>NULL</i> returned.
     *
     * @internal
     *      Resulting value is an array:
     *      <pre>
     *          array(
     *              'date' => UTCDateTime(\DateTime::timestamp),
     *              'tz'   => TimeZone-Identifier (e.g. "Europe/Berlin")
     *          )
     *      </pre>
     *
     * @see \Doctrine\ODM\MongoDB\Types\Type::convertToDatabaseValue()
     *
     * @param mixed|\DateTimeInterface|null $value
     */
    public function convertToDatabaseValue($value): ?array
    {
        if ( ! $value instanceof \DateTime) {
            return null;
        }

        $timezone  = $value->getTimezone()->getName();
        $timestamp = $value->getTimestamp();
        $date      = new UTCDateTime($timestamp * 1000);

        return [
            'date' => $date,
            'tz' => $timezone,
        ];
    }

    /**
     * PHP code to be used in DoctrineMongoODM-Hydrators.
     *
     * @return string
     *
     * @see convertToDatabaseValue()
     */
    public function closureToDatabase()
    {
        return '
            /* CODE FROM: '.__METHOD__.' */
            if (!$value instanceOf \DateTime) return null;
            $return = array(
                "date" => new UTCDateTime($value->getTimestamp()),
                "tz" => $value->getTimestamp()->getName()
            );
            /* ---- */';
    }

    /**
     * Converts a TimezoneAwareDate array to a \DateTime Object.
     *
     * Returns <i>NULL</i>, if <code>$value</code> is an unknown format.
     *
     * @param array|mixed|null $value
     *
     * @throws \Exception
     * @psalm-suppress UndefinedPropertyFetch
     */
    public function convertToPhpValue($value): ?\DateTimeInterface
    {
        if ( ! \is_array($value)
            || ! isset($value['date'])
            || ! $value['date'] instanceof UTCDateTime
            || ! isset($value['tz'])
        ) {
            return null;
        }

        /** @var string $timezone */
        $timezone = $value['tz'];
        $dateVal  = $value['date'];
        /** @var string $timestamp */
        $timestamp = $dateVal->sec;
        $date      = new \DateTime('@'.$timestamp);
        $date->setTimezone(new \DateTimeZone($timezone));

        return $date;
    }

    /**
     * PHP code to be used in DoctrineMongoODM-Hydrators.
     *
     * @see convertToPhpValue()
     */
    public function closureToPhp(): string
    {
        return '
            /* CODE FROM: '.__METHOD__.' */
            if (!is_array($value)
                || !isset($value["date"])
                || is_null($value["date"])
                || !isset($value["tz"])
            ) {
                $return = null;
            } else {
                //$date = new \DateTime($value["date"]);
                $date = $value["date"]->toDateTime();
                $date->setTimezone(new \DateTimeZone($value["tz"]));
                $return = $date;
            }
            /* ---- */
            ';
    }
}
