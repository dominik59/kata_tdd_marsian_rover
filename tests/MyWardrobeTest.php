<?php


namespace Test;


use App\MyWardrobe;
use PHPUnit\Framework\TestCase;

class MyWardrobeTest extends TestCase
{
    /**
     * Example test.
     */
    public function testNoSegmentsReturnNoCombination()
    {
        //given
        $wardrobe = new MyWardrobe(250);

        //when
        $combinations = $wardrobe->getCombinations([]);

        //then
        $this->assertSame([], $combinations);
    }

    /**
     *
     */
    public function testEmptyWardrobeReturnNoCombination()
    {
        //given
        $wardrobe = new MyWardrobe(0);

        //when
        $combinations = $wardrobe->getCombinations([50, 75]);

        //then
        $this->assertSame([], $combinations);
    }

    /**
     *
     */
    public function testEmptyWardrobeAndNoCombinationsReturnNoCombination()
    {
        //given
        $wardrobe = new MyWardrobe(0);

        //when
        $combinations = $wardrobe->getCombinations([]);

        //then
        $this->assertSame([], $combinations);
    }

    /**
     *
     */
    public function testFillWardrobeWithOneSegment()
    {
        //given
        $wardrobe = new MyWardrobe(250);

        //when
        $combinations = $wardrobe->getCombinations([50]);

        //then
        $this->assertSame(
            [
                [50, 50, 50, 50, 50],
            ], $combinations
        );
    }

    /**
     *
     */
    public function testElementThatNotFitWillNotCreateCombination()
    {
        //given
        $wardrobe = new MyWardrobe(250);

        //when
        $combinations = $wardrobe->getCombinations([75]);

        //then
        $this->assertSame([], $combinations);
    }
}