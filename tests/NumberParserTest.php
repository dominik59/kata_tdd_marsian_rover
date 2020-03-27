<?php

namespace Test;

use App\NumberParser;
use PHPUnit\Framework\TestCase;

class NumberParserTest extends TestCase
{
    /**
     * Test parsing for single number.
     *
     * @dataProvider singleNumbersDataProvider
     */
    public function testParsingSingleNumber(int $inputNumber, string $expectedParsedNumber)
    {
        //given
        $numberParser = new NumberParser();

        //when
        $actualParsedNumber = $numberParser->number2words($inputNumber);

        //then
        $this->assertSame($expectedParsedNumber, $actualParsedNumber);
    }

    public function singleNumbersDataProvider(): ?\Generator
    {
        yield [
            'inputNumber' => 0,
            'expectedParsedNumber' => 'zero',
        ];
        yield [
            'inputNumber' => 1,
            'expectedParsedNumber' => 'one',
        ];
        yield [
            'inputNumber' => 2,
            'expectedParsedNumber' => 'two',
        ];
        yield [
            'inputNumber' => 3,
            'expectedParsedNumber' => 'three',
        ];
        yield [
            'inputNumber' => 4,
            'expectedParsedNumber' => 'four',
        ];
        yield [
            'inputNumber' => 5,
            'expectedParsedNumber' => 'five',
        ];
        yield [
            'inputNumber' => 6,
            'expectedParsedNumber' => 'six',
        ];
        yield [
            'inputNumber' => 7,
            'expectedParsedNumber' => 'seven',
        ];
        yield [
            'inputNumber' => 8,
            'expectedParsedNumber' => 'eight',
        ];
        yield [
            'inputNumber' => 9,
            'expectedParsedNumber' => 'nine',
        ];
    }

    /**
     * Test parsing for single number.
     *
     * @dataProvider numbersBetween10And20DataProvider
     */
    public function testParsingNumbersBetween10And20(int $inputNumber, string $expectedParsedNumber)
    {
        //given
        $numberParser = new NumberParser();

        //when
        $actualParsedNumber = $numberParser->number2words($inputNumber);

        //then
        $this->assertSame($expectedParsedNumber, $actualParsedNumber);
    }

    public function numbersBetween10And20DataProvider(): ?\Generator
    {
        yield [
            'inputNumber' => 10,
            'expectedParsedNumber' => 'ten',
        ];
        yield [
            'inputNumber' => 11,
            'expectedParsedNumber' => 'eleven',
        ];
        yield [
            'inputNumber' => 12,
            'expectedParsedNumber' => 'twelve',
        ];
        yield [
            'inputNumber' => 13,
            'expectedParsedNumber' => 'thirteen',
        ];
        yield [
            'inputNumber' => 14,
            'expectedParsedNumber' => 'fourteen',
        ];
        yield [
            'inputNumber' => 15,
            'expectedParsedNumber' => 'fifteen',
        ];
        yield [
            'inputNumber' => 16,
            'expectedParsedNumber' => 'sixteen',
        ];
        yield [
            'inputNumber' => 17,
            'expectedParsedNumber' => 'seventeen',
        ];
        yield [
            'inputNumber' => 18,
            'expectedParsedNumber' => 'eighteen',
        ];
        yield [
            'inputNumber' => 19,
            'expectedParsedNumber' => 'nineteen',
        ];
        yield [
            'inputNumber' => 20,
            'expectedParsedNumber' => 'twenty',
        ];
    }

    /**
     * Test parsing for single number.
     *
     * @dataProvider numbersBetween21And99DataProvider
     */
    public function testParsingNumbersBetween21And99(int $inputNumber, string $expectedParsedNumber)
    {
        //given
        $numberParser = new NumberParser();

        //when
        $actualParsedNumber = $numberParser->number2words($inputNumber);

        //then
        $this->assertSame($expectedParsedNumber, $actualParsedNumber);
    }

    public function numbersBetween21And99DataProvider(): ?\Generator
    {
        yield [
            'inputNumber' => 21,
            'expectedParsedNumber' => 'twenty-one',
        ];
        yield [
            'inputNumber' => 22,
            'expectedParsedNumber' => 'twenty-two',
        ];
        yield [
            'inputNumber' => 23,
            'expectedParsedNumber' => 'twenty-three',
        ];
        yield [
            'inputNumber' => 24,
            'expectedParsedNumber' => 'twenty-four',
        ];
        yield [
            'inputNumber' => 25,
            'expectedParsedNumber' => 'twenty-five',
        ];
        yield [
            'inputNumber' => 26,
            'expectedParsedNumber' => 'twenty-six',
        ];
        yield [
            'inputNumber' => 27,
            'expectedParsedNumber' => 'twenty-seven',
        ];
        yield [
            'inputNumber' => 28,
            'expectedParsedNumber' => 'twenty-eight',
        ];
        yield [
            'inputNumber' => 29,
            'expectedParsedNumber' => 'twenty-nine',
        ];
        yield [
            'inputNumber' => 30,
            'expectedParsedNumber' => 'thirty',
        ];
        yield [
            'inputNumber' => 40,
            'expectedParsedNumber' => 'fourty',
        ];
        yield [
            'inputNumber' => 50,
            'expectedParsedNumber' => 'fifty',
        ];
        yield [
            'inputNumber' => 60,
            'expectedParsedNumber' => 'sixty',
        ];
        yield [
            'inputNumber' => 70,
            'expectedParsedNumber' => 'seventy',
        ];
        yield [
            'inputNumber' => 80,
            'expectedParsedNumber' => 'eighty',
        ];
        yield [
            'inputNumber' => 90,
            'expectedParsedNumber' => 'ninety',
        ];
        yield [
            'inputNumber' => 44,
            'expectedParsedNumber' => 'fourty-four',
        ];
        yield [
            'inputNumber' => 33,
            'expectedParsedNumber' => 'thirty-three',
        ];
        yield [
            'inputNumber' => 55,
            'expectedParsedNumber' => 'fifty-five',
        ];
        yield [
            'inputNumber' => 66,
            'expectedParsedNumber' => 'sixty-six',
        ];
        yield [
            'inputNumber' => 77,
            'expectedParsedNumber' => 'seventy-seven',
        ];
        yield [
            'inputNumber' => 88,
            'expectedParsedNumber' => 'eighty-eight',
        ];
        yield [
            'inputNumber' => 99,
            'expectedParsedNumber' => 'ninety-nine',
        ];
    }
}
