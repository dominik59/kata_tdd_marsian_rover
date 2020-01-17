<?php


namespace App;


class OutlierFinder
{
    function find(array $integers): int
    {
        $outliner = 0;
        $isEvenCollection = $this->isCollectionMajorityEven($integers);
        foreach ($integers as $integer) {
            if ($isEvenCollection && !$this->isEvenNumber($integer)) {
                $outliner = $integer;
                break;
            } elseif (!$isEvenCollection && $this->isEvenNumber($integer)) {
                $outliner = $integer;
                break;
            }
        }

        return $outliner;
    }

    private function isCollectionMajorityEven(array $integers): bool
    {
        if (
            ($this->isEvenNumber($integers[0]) && $this->isEvenNumber($integers[1]))
            || ($this->isEvenNumber($integers[0]) && $this->isEvenNumber($integers[2]))
            || ($this->isEvenNumber($integers[1]) && $this->isEvenNumber($integers[2]))
        ) {
            $majorityEven = true;
        } else {
            $majorityEven = false;
        }

        return $majorityEven;
    }

    private function isEvenNumber(int $number)
    {
        return $number % 2 === 0;
    }
}
