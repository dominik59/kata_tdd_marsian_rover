<?php

namespace App;


class Cashier
{
    function getOrder($input)
    {
        $result = '';

        $matchedMenuItems = [];
        preg_match_all('/burger|fries|chicken|pizza|sandwich|onionrings|milkshake|coke/', $input, $matchedMenuItems);

        $currentItems = [
            'burger' => 0,
            'fries' => 0,
            'chicken' => 0,
            'pizza' => 0,
            'sandwich' => 0,
            'onionrings' => 0,
            'milkshake' => 0,
            'coke' => 0,
        ];

        foreach ($matchedMenuItems[0] as $item) {
            $currentItems[$item] += 1;
        }
        $results = [];
        foreach ($currentItems as $itemName => $numberOfOccurrences) {
            for ($i = 0; $i < $numberOfOccurrences; $i++) {
                $results[] = ucfirst($itemName);
            }
        }

        return implode(" ", $results);
    }
}
