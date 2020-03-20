<?php


namespace App;


class PokemonDamageCalculator
{
    function calculateDamage(string $yourType, string $opponentType, int $attack, int $defense): int
    {
        $effectiveness = [
            'fire' => [
                'grass' => 2,
                'water' => 0.5,
                'electric' => 1,
                'fire' => 0.5,
            ],
            'electric' => [
                'fire' => 1,
                'grass' => 1,
                'water' => 2,
                'electric' => 0.5,
            ],
            'water' => [
                'electric' => 0.5,
                'fire' => 2,
                'grass' => 0.5,
                'water' => 0.5,
            ],
            'grass' => [
                'water' => 2,
                'electric' => 1,
                'fire' => 0.5,
                'grass' => 0.5,
            ],
        ];

        return 50 * ($attack / $defense) * $effectiveness[$yourType][$opponentType];
    }
}
