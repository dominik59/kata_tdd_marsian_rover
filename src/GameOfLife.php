<?php

namespace App;

class GameOfLife
{
    public function getNextGeneration($initialGeneration = [])
    {
        $outcomeGeneration = $initialGeneration;

        foreach ($initialGeneration as $yIndex => $row) {
            foreach ($row as $xIndex => $actualCellStatus) {

                $numberOfLivingNeighbours = $this->countNeighbours($initialGeneration, $yIndex, $xIndex);

                if ($this->isAlive($actualCellStatus)) {

                    if ($numberOfLivingNeighbours == 2 || $numberOfLivingNeighbours == 3) {
                        $outcomeGeneration[$yIndex][$xIndex] = 1;
                    } else {
                        $outcomeGeneration[$yIndex][$xIndex] = 0;
                    }

                } else {
                    if ($numberOfLivingNeighbours == 3) {
                        $outcomeGeneration[$yIndex][$xIndex] = 1;
                    } else {
                        $outcomeGeneration[$yIndex][$xIndex] = 0;
                    }
                }
            }
        }

        return $outcomeGeneration;
    }

    /**
     * @param $initialGeneration
     * @param $yIndex
     * @param $xIndex
     *
     * @return int
     */
    private function countNeighbours($initialGeneration, $yIndex, $xIndex): int
    {
        $numberOfLivingNeighbours = 0;
        if (isset($initialGeneration[$yIndex - 1][$xIndex - 1])
            && ($initialGeneration[$yIndex - 1][$xIndex - 1] == 1)) {
            $numberOfLivingNeighbours++;
        }

        if (isset($initialGeneration[$yIndex - 1][$xIndex])
            && ($initialGeneration[$yIndex - 1][$xIndex] == 1)) {
            $numberOfLivingNeighbours++;
        }
        if (isset($initialGeneration[$yIndex - 1][$xIndex + 1])
            && ($initialGeneration[$yIndex - 1][$xIndex + 1] == 1)) {
            $numberOfLivingNeighbours++;
        }
        if (isset($initialGeneration[$yIndex][$xIndex + 1])
            && ($initialGeneration[$yIndex][$xIndex + 1] == 1)) {
            $numberOfLivingNeighbours++;
        }
        if (isset($initialGeneration[$yIndex + 1][$xIndex + 1])
            && $initialGeneration[$yIndex + 1][$xIndex + 1] == 1) {
            $numberOfLivingNeighbours++;
        }
        if (isset($initialGeneration[$yIndex + 1][$xIndex])
            && ($initialGeneration[$yIndex + 1][$xIndex] == 1)) {
            $numberOfLivingNeighbours++;
        }
        if (isset($initialGeneration[$yIndex + 1][$xIndex - 1])
            && ($initialGeneration[$yIndex + 1][$xIndex - 1] == 1)) {
            $numberOfLivingNeighbours++;
        }
        if (isset($initialGeneration[$yIndex][$xIndex - 1])
            && ($initialGeneration[$yIndex][$xIndex - 1] == 1)) {
            $numberOfLivingNeighbours++;
        }

        return $numberOfLivingNeighbours;
    }

    /**
     * @param $actualCellStatus
     *
     * @return bool
     */
    private function isAlive($actualCellStatus): bool
    {
        return $actualCellStatus == 1;
    }
}