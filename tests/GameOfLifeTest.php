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

    /**
     * @dataProvider dataProviderForTestGameOfLiveLivingCellWithLessThanTwoNeighboursDies
     */
    public function testGameOfLiveLivingCellWithLessThanTwoNeighboursDies($currentGeneration, $expectedGeneration)
    {
        //given
        $gameOfLife = new GameOfLife();

        //when
        $nextGeneration = $gameOfLife->getNextGeneration($currentGeneration);

        //then
        $this->assertEquals($expectedGeneration, $nextGeneration);
    }

    public function dataProviderForTestGameOfLiveLivingCellWithLessThanTwoNeighboursDies()
    {
        yield[
            'currentGeneration' => [
                [0, 0, 0],
                [0, 1, 0],
                [0, 0, 0],
            ],
            'expectedGeneration' => [
                [0, 0, 0],
                [0, 0, 0],
                [0, 0, 0],
            ],
        ];
        yield[
            'currentGeneration' => [
                [0, 1, 0],
                [0, 1, 0],
                [0, 0, 0],
            ],
            'expectedGeneration' => [
                [0, 0, 0],
                [0, 0, 0],
                [0, 0, 0],
            ],
        ];
        yield[
            'currentGeneration' => [
                [0, 0, 0],
                [0, 0, 1],
                [0, 1, 1],
            ],
            'expectedGeneration' => [
                [0, 0, 0],
                [0, 1, 1],
                [0, 1, 1],
            ],
        ];
        yield[
            'currentGeneration' => [
                [0, 0, 0],
                [0, 1, 1],
                [0, 1, 1],
            ],
            'expectedGeneration' => [
                [0, 0, 0],
                [0, 1, 1],
                [0, 1, 1],
            ],
        ];
    }

    /**
     * @dataProvider dataProviderForTestSuccessiveGenerations
     */
    public function testSuccessiveGenerations($currentGeneration, $expectedGeneration)
    {
        //given
        $gameOfLife = new GameOfLife();

        //when
        $nextGeneration = $gameOfLife->getNextGeneration($currentGeneration);

        //then
        $this->assertEquals($expectedGeneration, $nextGeneration);
    }

    public function dataProviderForTestSuccessiveGenerations()
    {
        yield[
            'currentGeneration' => [
                [0, 1, 0],
                [0, 1, 0],
                [0, 1, 0],
            ],
            'expectedGeneration' => [
                [0, 0, 0],
                [1, 1, 1],
                [0, 0, 0],
            ],
        ];
        yield[
            'currentGeneration' => [
                [0, 0, 0],
                [1, 1, 1],
                [0, 0, 0],
            ],
            'expectedGeneration' => [
                [0, 1, 0],
                [0, 1, 0],
                [0, 1, 0],
            ],
        ];
        yield[
            'currentGeneration' => [
                [0, 0, 1],
                [0, 1, 0],
                [1, 0, 0],
            ],
            'expectedGeneration' => [
                [0, 0, 0],
                [0, 1, 0],
                [0, 0, 0],
            ],
        ];
        yield[
            'currentGeneration' => [
                [0, 0, 0],
                [0, 1, 0],
                [0, 0, 0],
            ],
            'expectedGeneration' => [
                [0, 0, 0],
                [0, 0, 0],
                [0, 0, 0],
            ],
        ];
    }
}