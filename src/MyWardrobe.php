<?php


namespace App;


class MyWardrobe
{
    /**
     * @var int
     */
    private $wardrobeSize;

    /**
     * MyWardrobe constructor.
     *
     * @param int $wardrobeSize
     */
    public function __construct(int $wardrobeSize)
    {
        $this->wardrobeSize = $wardrobeSize;
    }

    public function getCombinations(array $segments)
    {
        $combinations = [];

        if ($this->wardrobeSize != 0 && count($segments) != 0) {
            $availablePlank = $segments[0];

            $numberOfElementsThatFit = floor($this->wardrobeSize / $availablePlank);
            $suggestedCombination = array_fill(0, $numberOfElementsThatFit, $availablePlank);

            if ($this->doesSuggestedCombinationFit($suggestedCombination)) {
                $combinations[] = $suggestedCombination;
            }
        }

        return $combinations;
    }

    /**
     * @param array $suggestedCombination
     *
     * @return bool
     */
    private function doesSuggestedCombinationFit(array $suggestedCombination): bool
    {
        return array_sum($suggestedCombination) == $this->wardrobeSize;
    }
}