<?php


namespace Test;


use App\OutlierFinder;
use PHPUnit\Framework\TestCase;

class OutlierFinderTest extends TestCase
{
    public function testFindOddNumberUsingTreeInputNumbers()
    {
        //given
        $outlierFinder = new OutlierFinder();

        //when
        $foundOddNumber = $outlierFinder->find([2, 4, 5]);

        //then
        $this->assertSame(5, $foundOddNumber);
    }

    public function testFindEvenNumberUsingTreeInputNumbers()
    {
        //given
        $outlierFinder = new OutlierFinder();

        //when
        $foundOddNumber = $outlierFinder->find([2, 3, 5]);

        //then
        $this->assertSame(2, $foundOddNumber);
    }

    /**
     * @dataProvider dataProviderForTestFindConrrectNumber
     */
    public function testFindCorrectNumber($input, $output)
    {
        //given
        $outlierFinder = new OutlierFinder();

        //when
        $foundOddNumber = $outlierFinder->find($input);

        //then
        $this->assertSame($output, $foundOddNumber);
    }

    public function dataProviderForTestFindConrrectNumber()
    {
        yield [
            [1, 5, 4],
            4,
        ];
        yield [
            [1, 4, 5],
            4,
        ];
        yield [
            [4, 5, 1],
            4,
        ];
        yield [
            [2, 4, 5],
            5,
        ];
        yield [
            [11, 4, 4],
            11,
        ];
    }
}
