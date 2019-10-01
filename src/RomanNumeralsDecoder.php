<?php


namespace App;


class RomanNumeralsDecoder
{
    const ROMAN_TO_ARABIC_MAP = [
        'I' => 1,
        'V' => 5,
        'X' => 10,
        'L' => 50,
        'C' => 100,
        'D' => 500,
        'M' => 1000,
    ];

    public function solution(string $roman): int
    {
        $romanChars = str_split($roman);
        $result = 0;

        foreach ($romanChars as $currentCharPosition => $currentRomanChar) {
            $nextRomanChar = $romanChars[$currentCharPosition + 1] ?? null;

            if ($nextRomanChar) {
                $currentArabicNumber = $this->getArabicNumber($currentRomanChar);
                $nextArabicNumber = $this->getArabicNumber($nextRomanChar);

                if ($currentArabicNumber < $nextArabicNumber) {
                    $result -= $currentArabicNumber;
                } else {
                    $result += $currentArabicNumber;
                }

            } else {
                $result += $this->getArabicNumber($currentRomanChar);
            }
        }

        return $result;
    }

    protected function getArabicNumber($romanCharacter)
    {
        return static::ROMAN_TO_ARABIC_MAP[$romanCharacter];
    }
}
