<?php


namespace App;


class LikesParser
{
    function likes(array $names): string
    {
        if ($names === []) {
            $likesInformation = 'no one likes this';
        } elseif (count($names) === 1) {
            $likesInformation = reset($names) . ' likes this';
        } elseif (count($names) === 2) {
            $likesInformation = implode(' and ', $names) . ' like this';
        } elseif (count($names) === 3) {
            $likesInformation = implode(', ', array_slice($names, 0, 2))
                . ' and '
                . implode('', array_slice($names, 2, 1))
                . ' like this';
        } else {
            $twoFirstImplodedNames = implode(', ', array_slice($names, 0, 2));

            $likesInformation = $twoFirstImplodedNames
                . ' and '
                . count(array_slice($names, 2))
                . ' others like this';
        }

        return $likesInformation;
    }
}
