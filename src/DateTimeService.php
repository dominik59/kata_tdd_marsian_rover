<?php


namespace App;


use DateInterval;
use DateTime;
use DateTimeZone;

class DateTimeService
{
    public function createUtcDateTime(string $format, string $dateString): DateTime
    {
        return DateTime::createFromFormat($format, $dateString, new DateTimeZone('UTC'));
    }

    public function convertDateTimeToTimeZone(DateTime $dateToConvert, string $newTimeZone): DateTime
    {
        try {
            $newDateTimeZoneObject = new DateTimeZone($newTimeZone);
            $newDatetime = DateTime::createFromFormat(
                'Y-m-d H:i:s',
                $dateToConvert->format('Y-m-d H:i:s'),
                $dateToConvert->getTimezone()
            );

            $offsetToCurrentTimeZone = $newDateTimeZoneObject->getOffset($dateToConvert);
            $myInterval = DateInterval::createFromDateString((string) $offsetToCurrentTimeZone . 'seconds');
            $newDatetime->add($myInterval);
        } catch (\Exception $exception) {
            $newDatetime = $dateToConvert;
        }

        return $newDatetime;
    }
}
