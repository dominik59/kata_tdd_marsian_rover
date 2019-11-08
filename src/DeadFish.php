<?php


namespace App;


class DeadFish
{
    public function parse($data): array
    {
        $defaultValue = 0;
        $result = [];
        $stingSplit = str_split($data);
        foreach ($stingSplit as $character) {
            switch ($character) {
                case 'i':
                {
                    $defaultValue++;
                    break;
                }
                case 'd':
                {
                    $defaultValue--;
                    break;
                }
                case 's':
                {
                    $defaultValue *= $defaultValue;
                    break;
                }
                case 'o':
                {
                    $result[] = $defaultValue;
                    break;
                }
            }
        }

        return $result;
    }
}
