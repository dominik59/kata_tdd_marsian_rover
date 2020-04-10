<?php


namespace App;


class NumberParser
{
    function number2words(int $number): string
    {
        $numbersMap = [
            0 => 'zero',
            1 => 'one',
            2 => 'two',
            3 => 'three',
            4 => 'four',
            5 => 'five',
            6 => 'six',
            7 => 'seven',
            8 => 'eight',
            9 => 'nine',
            10 => 'ten',
            11 => 'eleven',
            12 => 'twelve',
            13 => 'thirteen',
            14 => 'fourteen',
            15 => 'fifteen',
            16 => 'sixteen',
            17 => 'seventeen',
            18 => 'eighteen',
            19 => 'nineteen',
            20 => 'twenty',
            30 => 'thirty',
            40 => 'fourty',
            50 => 'fifty',
            60 => 'sixty',
            70 => 'seventy',
            80 => 'eighty',
            90 => 'ninety',
        ];

        if ($number === 0) {
            return $numbersMap[$number];
        }
        $parsedNumber = '';
        if ($number >= 100) {
            $parsedNumber = $numbersMap[(int) ($number / 100)] . ' hundred ';
            $number = $number - (int) ($number / 100) * 100;
        }

        if ($number > 20 && $number < 100 && $number % 10 !== 0) {
            $parsedNumber .= $numbersMap[(int) ($number / 10) * 10] . '-' . $numbersMap[$number - (int) ($number / 10) * 10];
        } elseif ($number > 0) {
            $parsedNumber .= $numbersMap[$number];
        }

        return trim($parsedNumber);
    }
}
