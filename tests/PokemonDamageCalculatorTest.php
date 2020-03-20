<?php

namespace Test;

use App\PokemonDamageCalculator;
use PHPUnit\Framework\TestCase;

class PokemonDamageCalculatorTest extends TestCase
{
    /**
     * @dataProvider dataProviderForTestDamageCalculationOfTheSameTypeCreatures
     */
    public function testDamageCalculationOfTheSameTypeCreatures($inputData, $damage): void
    {
        //given
        $pokemonDamageCalculator = new PokemonDamageCalculator();

        //when
        $calculatedDamage = $pokemonDamageCalculator->calculateDamage(
            $inputData['yourType'],
            $inputData['opponentType'],
            $inputData['attack'],
            $inputData['defence']
        );

        //then
        static::assertSame($damage, $calculatedDamage);
    }

    public function dataProviderForTestDamageCalculationOfTheSameTypeCreatures(): ?\Generator
    {
        yield   'fire types' => [
            'input data' => [
                'yourType' => 'fire',
                'opponentType' => 'fire',
                'attack' => 100,
                'defence' => 100,
            ],
            'damage' => 25,
        ];
        yield   'water types' => [
            'input data' => [
                'yourType' => 'water',
                'opponentType' => 'water',
                'attack' => 100,
                'defence' => 100,
            ],
            'damage' => 25,
        ];
        yield   'grass types' => [
            'input data' => [
                'yourType' => 'grass',
                'opponentType' => 'grass',
                'attack' => 100,
                'defence' => 100,
            ],
            'damage' => 25,
        ];
        yield   'electric types' => [
            'input data' => [
                'yourType' => 'electric',
                'opponentType' => 'electric',
                'attack' => 100,
                'defence' => 100,
            ],
            'damage' => 25,
        ];
        yield   'electric types different attact and deffencr' => [
            'input data' => [
                'yourType' => 'electric',
                'opponentType' => 'electric',
                'attack' => 50,
                'defence' => 100,
            ],
            'damage' => 12,
        ];
        yield 'fire vs fire12' => [
            'input data' => [
                'yourType' => 'fire',
                'opponentType' => 'fire',
                'attack' => 96,
                'defence' => 3,
            ],
            'damage' => 800,
        ];
    }

    /**
     * @dataProvider dataProviderForTestNotVeryEffectiveDamageCalculation
     */
    public function testNotVeryEffectiveDamageCalculation($inputData, $damage): void
    {
        //given
        $pokemonDamageCalculator = new PokemonDamageCalculator();

        //when
        $calculatedDamage = $pokemonDamageCalculator->calculateDamage(
            $inputData['yourType'],
            $inputData['opponentType'],
            $inputData['attack'],
            $inputData['defence']
        );

        //then
        static::assertSame($damage, $calculatedDamage);
    }

    public function dataProviderForTestNotVeryEffectiveDamageCalculation(): ?\Generator
    {
        yield 'grass vs fire' => [
            'input data' => [
                'yourType' => 'grass',
                'opponentType' => 'fire',
                'attack' => 100,
                'defence' => 100,
            ],
            'damage' => 25,
        ];
        yield 'fire vs water' => [
            'input data' => [
                'yourType' => 'fire',
                'opponentType' => 'water',
                'attack' => 100,
                'defence' => 100,
            ],
            'damage' => 25,
        ];
        yield 'water vs grass' => [
            'input data' => [
                'yourType' => 'water',
                'opponentType' => 'grass',
                'attack' => 100,
                'defence' => 100,
            ],
            'damage' => 25,
        ];
        yield 'water vs electric' => [
            'input data' => [
                'yourType' => 'water',
                'opponentType' => 'electric',
                'attack' => 100,
                'defence' => 100,
            ],
            'damage' => 25,
        ];
    }
}
