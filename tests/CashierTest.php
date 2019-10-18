<?php

namespace Tests;

use App\Cashier;
use PHPUnit\Framework\TestCase;

class CashierTest extends TestCase
{
    /**
     * @dataProvider  dataProviderForTestOneStringCapitalisation
     */
    public function testOneStringCapitalisation($input, $output)
    {
        $cashier = new Cashier();

        $order = $cashier->getOrder($input);

        $this->assertEquals($output, $order);
    }

    public function dataProviderForTestOneStringCapitalisation()
    {
        yield [
            'burger',
            'Burger',
        ];
        yield [
            'fries',
            'Fries',
        ];
        yield [
            'chicken',
            'Chicken',
        ];
        yield [
            'pizza',
            'Pizza',
        ];
        yield [
            'sandwich',
            'Sandwich',
        ];
        yield [
            'onionrings',
            'Onionrings',
        ];
        yield [
            'milkshake',
            'Milkshake',
        ];
        yield [
            'coke',
            'Coke',
        ];
    }

    /**
     * @dataProvider  dataProviderForTestReturnSeparateWordsWithoutOrdering
     */
    public function testReturnSeparateWordsWithoutOrdering($input, $output)
    {
        $cashier = new Cashier();

        $order = $cashier->getOrder($input);

        $this->assertEquals($output, $order);
    }

    public function dataProviderForTestReturnSeparateWordsWithoutOrdering()
    {
        yield [
            'burgerburger',
            'Burger Burger',
        ];
        yield [
            'burgerburgerburger',
            'Burger Burger Burger',
        ];
        yield [
            'burgerfries',
            'Burger Fries',
        ];
        yield [
            'burgerfrieschickenpizzasandwichonionringsmilkshakecoke',
            'Burger Fries Chicken Pizza Sandwich Onionrings Milkshake Coke',
        ];
    }

    /**
     * @dataProvider dataProviderForTestReturnSortedMenuItems
     */
    public function testReturnSortedMenuItems($input, $output)
    {
        $cashier = new Cashier();

        $order = $cashier->getOrder($input);

        $this->assertEquals($output, $order);
    }

    public function dataProviderForTestReturnSortedMenuItems()
    {
        yield [
            'friesburger',
            'Burger Fries',
        ];
    }


}
