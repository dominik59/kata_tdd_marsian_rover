<?php


namespace App;


class Wardrobe
{
    /**
     * @var array
     */
    private $availablePlanks;

    /**
     * Wardrobe constructor.
     *
     * @param array $availablePlanks
     */
    public function __construct(array $availablePlanks)
    {
        $this->availablePlanks = $availablePlanks;
        sort($availablePlanks);
    }

    public function getPossibleElements(int $availableSize)
    {
        $currentSize = 0;
        $possibleElements = [];

        foreach ($this->availablePlanks as $plankSize) {
            if ($currentSize === $availableSize) {
                break;
            }

            if (($availableSize - $currentSize) % $plankSize == 0) {
                $numberOfPlanksToFill = (int)($availableSize - $currentSize) / $plankSize;
                $possibleElements[0][$plankSize] = $numberOfPlanksToFill;
                $currentSize += $numberOfPlanksToFill * $plankSize;
            }
        }

        return $possibleElements;
    }
}