<?php


namespace Test;


use App\DeadFish;
use PHPUnit\Framework\TestCase;

class DeadFishTest extends TestCase
{
    public function testEmptyArrayReturnOnNoInput()
    {
        //given
        $deadFish = new DeadFish();

        //when
        $result = $deadFish->parse('');

        //then
        $this->assertEquals([], $result);
    }

    /**
     *
     */
    public function testReturningOutputWhenOLetterOnInput()
    {
        //given
        $deadFish = new DeadFish();

        //when
        $result = $deadFish->parse('o');

        //then
        $this->assertEquals([0], $result);
    }

    /**
     * @dataProvider inputCommandAndResultDataProvider
     */
    public function testReturnIncrementedValue($input, $expect)
    {
        //given
        $deadFish = new DeadFish();

        //when
        $result = $deadFish->parse($input);

        //then
        $this->assertEquals($expect, $result);
    }

    public function inputCommandAndResultDataProvider()
    {
        return [
            ['io', [1]],
            ['iio', [2]],
            ['iido', [1]],
            ['iiddo', [0]],
            ['iisoio', [4, 5]],
        ];
    }


}
