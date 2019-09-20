<?php


namespace App;


class MyWardrobe
{
    private $size = 250;

    public function getCombinations(array $segmentsArray)
    {
        $outputCombinations = [];

        array_walk($segmentsArray, function ($segment) use ($segmentsArray, &$outputCombinations) {
            $proposedCombinations = [];

            $numberOfSegmentsThatFit = floor($this->size / $segment);
            $currentCombination = [];
            for ($i = 0; $i < $numberOfSegmentsThatFit; $i++) {
                $currentCombination[] = $segment;
            }
            if (array_sum($currentCombination) == $this->size) {
                $proposedCombinations[] = $currentCombination;
            }

            foreach ($segmentsArray as $segment) {
            }
        });


        return $outputCombinations;
    }
}