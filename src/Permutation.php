<?php


namespace App;


class Permutation
{
    public function josephus(array $items, int $fold): array
    {
        $output = [];
        $position = 0;
        while (count($items) > count($output)) {
            if ($position === 0 && $fold !== 1) {
                continue;
            }

            if ($position % $fold === 0) {
                $output[] = $items[$position];
                $position++;
            }
            $position++;
            if ($position > count($items)) {
                $position = 0;
            }
        }

        return $output;
    }
}
