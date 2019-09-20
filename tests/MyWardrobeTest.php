<?php


namespace Test;


use App\MyWardrobe;
use PHPUnit\Framework\TestCase;

class MyWardrobeTest extends TestCase
{
    /**
     *
     */
    public function testNoElementsResultInNoCombination()
    {
        //given
        $wardrobeObject = new MyWardrobe();
        $segments = [];

        //when
        $combinations = $wardrobeObject->getCombinations($segments);

        //then
        $this->assertSame([], $combinations);
    }

    /**
     *
     */
    public function testProperCombinationOnOneElementProvided()
    {
        //given
        $wardrobeObject = new MyWardrobe();
        $segments = [50];

        //when
        $combinations = $wardrobeObject->getCombinations($segments);

        //then
        $this->assertSame([[50, 50, 50, 50, 50]], $combinations);
    }

    /**
     *
     */
    public function testTwoSegmentsResultInProperCombination()
    {
        //given
        $wardrobeObject = new MyWardrobe();
        $segments = [50, 100];

        //when
        $combinations = $wardrobeObject->getCombinations($segments);

        //then
        $this->assertSame([
            [50, 50, 50, 50, 50],
            [50, 100, 100],
        ], $combinations);
    }

}