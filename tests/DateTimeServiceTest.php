<?php


namespace Test;


use App\DateTimeService;
use DateInterval;
use DateTime;
use DateTimeZone;
use PHPUnit\Framework\TestCase;

class DateTimeServiceTest extends TestCase
{
    public function testConvertDateTimeBetweenZones()
    {
        //given
        $utcTimeZone = new DateTimeZone('UTC');
        $userTimezone = new DateTimeZone('Australia/Brisbane');

        //when
        $date = DateTime::createFromFormat('Y m d H:i', '2009 02 15 15:16', $utcTimeZone);
        $offset = $userTimezone->getOffset($date);
        $myInterval = DateInterval::createFromDateString((string) $offset . 'seconds');
        $date->add($myInterval);

        //then
        $result = $date->format('Y-m-d H:i:s');
    }

    public function testCreateUtcDateTimeOutOfStringAndFormat()
    {
        //given
        $dateTimeService = new DateTimeService();

        //when
        $utcDateTime = $dateTimeService->createUtcDateTime('Y m d H:i', '2009 02 15 15:16');

        //then
        $this->assertSame(
            DateTime::createFromFormat(
                'Y m d H:i',
                '2009 02 15 15:16',
                new DateTimeZone('UTC')
            )->format('Y m d H:i'),
            $utcDateTime->format('Y m d H:i')
        );
    }

    public function testDateTimeConversion()
    {
        //given
        $dateTimeService = new DateTimeService();
        $utcTimeZone = new DateTimeZone('UTC');
        $utcDateTime = DateTime::createFromFormat('Y m d H:i', '2009 02 15 00:00', $utcTimeZone);

        //when
        $convertedTimeZone = $dateTimeService->convertDateTimeToTimeZone($utcDateTime, 'Australia/Brisbane');

        //then
        $this->assertSame(
            DateTime::createFromFormat(
                'Y m d H:i',
                '2009 02 15 10:00',
                new DateTimeZone('UTC')
            )->format('Y m d H:i'),
            $convertedTimeZone->format('Y m d H:i')
        );
    }

    public function testReturnTheSameDateTimeWhenWrongTimeZoneProvided()
    {
        //given
        $dateTimeService = new DateTimeService();
        $utcTimeZone = new DateTimeZone('UTC');
        $utcDateTime = DateTime::createFromFormat('Y m d H:i', '2009 02 15 00:00', $utcTimeZone);

        //when
        $convertedTimeZone = $dateTimeService->convertDateTimeToTimeZone($utcDateTime, 'NotExistingTimeZone');

        //then
        $this->assertSame(
            DateTime::createFromFormat(
                'Y m d H:i',
                '2009 02 15 00:00',
                new DateTimeZone('UTC')
            )->format('Y m d H:i'),
            $convertedTimeZone->format('Y m d H:i')
        );
    }
}
