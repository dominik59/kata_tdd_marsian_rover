<?php

namespace Tests;

use App\Permutation;
use PHPUnit\Framework\TestCase;

class JosephusTest extends TestCase
{

    public function testEmptyInputResultsInEmptyResult()
    {
        //given
        $josephus = new Permutation();

        //when
        $result = $josephus->josephus([], 1);

        //then
        $this->assertEquals([], $result);
    }

    /**
     * @dataProvider dataProviderForTestOnlyOneItem
     */
    public function testOnlyOneItemResultsInOneItem(array $input, array $ouput): void
    {
        //given
        $josephus = new Permutation();

        //when
        $result = $josephus->josephus($input['items'], $input['fold']);

        //then
        $this->assertEquals($ouput, $result);
    }

    public function dataProviderForTestOnlyOneItem()
    {
        yield [
            [
                'items' => [1],
                'fold' => 1,
            ],
            [1],
        ];
        yield [
            [
                'items' => [2],
                'fold' => 10,
            ],
            [2],
        ];
        yield [
            [
                'items' => [3],
                'fold' => 7,
            ],
            [3],
        ];
    }

    /**
     * @dataProvider dataProviderForTestInputCountMatchesOutputCount
     */
    public function testInputCountMatchesOutputCount(array $input, array $ouput): void
    {
        //given
        $josephus = new Permutation();

        //when
        $result = $josephus->josephus($input['items'], $input['fold']);

        //then
        $this->assertEquals($ouput, $result);
    }

    public function dataProviderForTestInputCountMatchesOutputCount()
    {
        yield [
            [
                'items' => [1],
                'fold' => 1,
            ],
            [1],
        ];
        yield [
            [
                'items' => [2, 3],
                'fold' => 1,
            ],
            [2, 3],
        ];
        yield [
            [
                'items' => [5, 10, 15],
                'fold' => 1,
            ],
            [5, 10, 15],
        ];
    }

    /**
     * @dataProvider dataProviderForTestTwoFoldReturnsProperOrder
     */
    public function testTwoFoldReturnsProperOrder(array $input, array $ouput): void
    {
        //given
        $josephus = new Permutation();

        //when
        $result = $josephus->josephus($input['items'], $input['fold']);

        //then
        $this->assertEquals($ouput, $result);
    }

    public function dataProviderForTestTwoFoldReturnsProperOrder()
    {
        yield [
            [
                'items' => [1,2,3,4],
                'fold' => 2,
            ],
            [2,4,3,1],
        ];
    }




    /**
     *
     */
    public function test()
    {
        //given


        //when
        //then
    }
}
