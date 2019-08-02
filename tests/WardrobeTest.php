<?php
declare(strict_types=1);

namespace Test;

use App\Wardrobe;
use PHPUnit\Framework\TestCase;

class WardrobeTest extends TestCase
{
    /**
     * Calculate Wardrobe elements which will fit specified dimensions.
     *
     * @dataProvider dataProviderForTestAvailablePlanksWillBeChosenForSpecifiedDimension
     *
     * @param int   $availableSize  Available size
     * @param array $expectedOutput Expected output
     */
    public function testAvailablePlanksWillBeChosenForSpecifiedDimension(int $availableSize, array $expectedOutput)
    {
        //given
        $wardrobe = new Wardrobe([50, 75, 100, 120]);

        //when
        $necessaryElements = $wardrobe->getPossibleElements($availableSize);

        //then
        $this->assertEquals($expectedOutput, $necessaryElements);
    }

    public function dataProviderForTestAvailablePlanksWillBeChosenForSpecifiedDimension()
    {
        yield[
            'availableSize' => 50,
            'expectedOutput' => [
                [
                    '50' => 1,
                ],
            ],
        ];

        yield[
            'availableSize' => 75,
            'expectedOutput' => [
                [
                    '75' => 1,
                ],
            ],
        ];

        yield[
            'availableSize' => 100,
            'expectedOutput' => [
                [
                    '50' => 2,
                ],
            ],
        ];

        yield[
            'availableSize' => 150,
            'expectedOutput' => [
                [
                    '50' => 3,
                ],
            ],
        ];

        yield[
            'availableSize' => 200,
            'expectedOutput' => [
                [
                    '50' => 4,
                ],
            ],
        ];

        yield[
            'availableSize' => 250,
            'expectedOutput' => [
                [
                    '50' => 5,
                ],
            ],
        ];
    }
}
