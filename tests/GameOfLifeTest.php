<?php

namespace Test;

use App\GameOfLife;
use PHPUnit\Framework\TestCase;

class GameOfLifeTest extends TestCase
{
    public function testGameOfLifeReturnsArray()
    {
        $gameOfLife = new GameOfLife();

        $this->assertIsArray($gameOfLife->getNextGeneration());
    }

    public function testGameOfLifeReturnsNextGeneration()
    {
        $gameOfLife = new GameOfLife();
        $currentGeneration = [
            [0, 0, 0],
            [0, 0, 0],
            [0, 0, 0],
        ];
        $nextGeneration = [
            [0, 0, 0],
            [0, 0, 0],
            [0, 0, 0],
        ];

        $this->assertEquals($nextGeneration, $gameOfLife->getNextGeneration($currentGeneration));
    }

    public function testGameOfLiveLivingCellWithLessThanTwoNeighboursDies()
    {
        $gameOfLife = new GameOfLife();
        $currentGeneration = [
            [0, 0, 0],
            [0, 1, 0],
            [0, 0, 0],
        ];
        $nextGeneration = [
            [0, 0, 0],
            [0, 0, 0],
            [0, 0, 0],
        ];

        $this->assertEquals($nextGeneration, $gameOfLife->getNextGeneration($currentGeneration));
        $currentGeneration = [
            [0, 1, 0],
            [0, 1, 0],
            [0, 0, 0],
        ];
        $nextGeneration = [
            [0, 0, 0],
            [0, 0, 0],
            [0, 0, 0],
        ];

        $this->assertEquals($nextGeneration, $gameOfLife->getNextGeneration($currentGeneration));
    }
}