<?php

namespace App;


use PHPUnit\Framework\TestCase;

class RomanNumeralsDecoderTest extends TestCase
{
    /**
     * @dataProvider dataProviderForTestSolution
     */
    public function testSingleCharReturnsProperValue(string $input, int $expected): void
    {
        $romanNumbersDecoder = new RomanNumeralsDecoder();
        $result = $romanNumbersDecoder->solution($input);
        $this->assertEquals($expected, $result);
    }

    /**
     * @dataProvider dataProviderForTestSimpleMultipleRomanCharacters
     */
    public function testSimpleMultipleRomanCharacters(string $input, int $expected)
    {
        $romanNumbersDecoder = new RomanNumeralsDecoder();
        $result = $romanNumbersDecoder->solution($input);
        $this->assertEquals($expected, $result);
    }

    /**
     * @dataProvider dataProviderForTestMultipleRomanCharactersWithDescending
     */
    public function testMultipleRomanCharactersWithDescending(string $input, int $expected)
    {
        $romanNumbersDecoder = new RomanNumeralsDecoder();
        $result = $romanNumbersDecoder->solution($input);
        $this->assertEquals($expected, $result);
    }

    public function dataProviderForTestSolution()
    {
        yield 'single char: I' => [
            'input' => 'I',
            'output' => 1,
        ];
        yield 'single char: V' => [
            'input' => 'V',
            'output' => 5,
        ];
        yield 'single char: X' => [
            'input' => 'X',
            'output' => 10,
        ];
        yield 'single char: L' => [
            'input' => 'L',
            'output' => 50,
        ];
        yield 'single char: C' => [
            'input' => 'C',
            'output' => 100,
        ];
        yield 'single char: D' => [
            'input' => 'D',
            'output' => 500,
        ];
        yield 'single char: M' => [
            'input' => 'M',
            'output' => 1000,
        ];
    }

    public function dataProviderForTestSimpleMultipleRomanCharacters()
    {
        yield 'multiple chars: II' => [
            'input' => 'II',
            'expected' => 2,
        ];
        yield 'multiple chars: MM' => [
            'input' => 'MM',
            'expected' => 2000,
        ];
        yield 'multiple chars: III' => [
            'input' => 'III',
            'expected' => 3,
        ];
        yield 'multiple chars: VI' => [
            'input' => 'VI',
            'expected' => 6,
        ];
        yield 'multiple chars: VII' => [
            'input' => 'VII',
            'expected' => 7,
        ];
        yield 'multiple chars: VIII' => [
            'input' => 'VIII',
            'expected' => 8,
        ];
        yield 'multiple chars: MMMM' => [
            'input' => 'MMMM',
            'expected' => 4000,
        ];
    }

    public function dataProviderForTestMultipleRomanCharactersWithDescending()
    {
        yield 'single char: IV' => [
            'input' => 'IV',
            'output' => 4,
        ];
        yield 'single char: IX' => [
            'input' => 'IX',
            'output' => 9,
        ];
        yield 'single char: XL' => [
            'input' => 'XL',
            'output' => 40,
        ];
        yield 'single char: IC' => [
            'input' => 'IC',
            'output' => 99,
        ];
        yield 'single char: XCI' => [
            'input' => 'XCI',
            'output' => 91,
        ];
    }
}
