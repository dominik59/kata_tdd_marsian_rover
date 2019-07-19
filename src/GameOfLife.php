<?php

namespace App;

class GameOfLife
{
    public function getNextGeneration($initialGeneration = [])
    {
        $outcomeGeneration = $initialGeneration;

        foreach ($initialGeneration as $yIndex => $row) {
            foreach ($row as $xIndex => $actualCellStatus) {
                if ($actualCellStatus == 1) {
                    //if live
                    $numberOfLivingNeighbours = 0;
                    if (isset($initialGeneration[$yIndex - 1][$xIndex - 1])) {
                        if ($initialGeneration[$yIndex - 1][$xIndex - 1] == 1) {
                            $numberOfLivingNeighbours++;
                        }
                    }
                    if (isset($initialGeneration[$yIndex - 1][$xIndex])) {
                        if ($initialGeneration[$yIndex - 1][$xIndex] == 1) {
                            $numberOfLivingNeighbours++;
                        }
                    }
                    if (isset($initialGeneration[$yIndex - 1][$xIndex + 1])) {
                        if ($initialGeneration[$yIndex - 1][$xIndex + 1] == 1) {
                            $numberOfLivingNeighbours++;
                        }
                    }
                    if (isset($initialGeneration[$yIndex][$xIndex + 1])) {
                        if ($initialGeneration[$yIndex][$xIndex + 1] == 1) {
                            $numberOfLivingNeighbours++;
                        }
                    }
                    if (isset($initialGeneration[$yIndex + 1][$xIndex + 1])) {
                        if ($initialGeneration[$yIndex + 1][$xIndex + 1] == 1) {
                            $numberOfLivingNeighbours++;
                        }
                    }
                    if (isset($initialGeneration[$yIndex + 1][$xIndex])) {
                        if ($initialGeneration[$yIndex + 1][$xIndex] == 1) {
                            $numberOfLivingNeighbours++;
                        }
                    }
                    if (isset($initialGeneration[$yIndex + 1][$xIndex - 1])) {
                        if ($initialGeneration[$yIndex + 1][$xIndex - 1] == 1) {
                            $numberOfLivingNeighbours++;
                        }
                    }
                    if (isset($initialGeneration[$yIndex][$xIndex - 1])) {
                        if ($initialGeneration[$yIndex][$xIndex - 1] == 1) {
                            $numberOfLivingNeighbours++;
                        }
                    }

                    if ($numberOfLivingNeighbours == 2 || $numberOfLivingNeighbours == 3) {
                        //if there are 2 or 3 neighbours cell should live
                        $outcomeGeneration[$yIndex][$xIndex] = 1;
                    } else {
                        //if there are less than 2 or more than 3 neighbours cell should die
                        $outcomeGeneration[$yIndex][$xIndex] = 0;
                    }

                } else {
                    //if dead

                }
            }
        }

        return $outcomeGeneration;
    }
}