<?php


namespace Test;


use App\SupplierGrouper;
use PHPUnit\Framework\TestCase;

class SupplierGrouperTest extends TestCase
{
    public function testReturnJustOneSupplierWhenOneProvided(): void
    {
        //given
        $rawCollection = [
            [
                'id' => 1000,
                'group' => null,
                'distance' => 1,
            ],
        ];
        $supplierGrouper = new SupplierGrouper();

        //when
        $groupedSuppliers = $supplierGrouper->group($rawCollection);

        //then
        $this->assertSame(
            [
                [
                    'id' => 1000,
                    'group' => null,
                    'distance' => 1,
                ],
            ],
            $groupedSuppliers
        );
    }

    public function testSupplierWithBranchShouldBecomeJustClosestOne(): void
    {
        //given
        $rawCollection = [
            [
                'id' => 1000,
                'group' => null,
                'distance' => 1,
            ],
            [
                'id' => 1000,
                'group' => null,
                'distance' => 5,
            ],
        ];
        $supplierGrouper = new SupplierGrouper();

        //when
        $groupedSuppliers = $supplierGrouper->group($rawCollection);

        //then
        $this->assertSame(
            [
                [
                    'id' => 1000,
                    'group' => null,
                    'distance' => 1,
                ],
            ],
            $groupedSuppliers
        );
    }

    public function testGroupedSuppliersWithoutBranchesShouldReturnOneClosestInGroup(): void
    {
        //given
        $rawCollection = [
            [
                'id' => 1000,
                'group' => 10,
                'distance' => 1,
            ],
            [
                'id' => 1001,
                'group' => 10,
                'distance' => 5,
            ],
        ];
        $supplierGrouper = new SupplierGrouper();

        //when
        $groupedSuppliers = $supplierGrouper->group($rawCollection);

        //then
        $this->assertSame(
            [
                [
                    'id' => 1000,
                    'group' => 10,
                    'distance' => 1,
                ],
            ],
            $groupedSuppliers
        );
    }

    /**
     * @dataProvider dataProviderForTestGroupedSuppliersWithBranchesShouldReturnOneClosestInGroupAndInBranch
     */
    public function testGroupedSuppliersWithBranchesShouldReturnOneClosestInGroupAndInBranch(
        array $rawCollection,
        array $expectedResult
    ): void {
        $supplierGrouper = new SupplierGrouper();

        //when
        $groupedSuppliers = $supplierGrouper->group($rawCollection);

        //then
        $this->assertSame(
            $expectedResult,
            $groupedSuppliers
        );
    }

    public function dataProviderForTestGroupedSuppliersWithBranchesShouldReturnOneClosestInGroupAndInBranch()
    {
        yield [
            'rawCollection' => [
                [
                    'id' => 1000,
                    'group' => 10,
                    'distance' => 1,
                ],
                [
                    'id' => 1000,
                    'group' => 10,
                    'distance' => 7,
                ],
                [
                    'id' => 1001,
                    'group' => 11,
                    'distance' => 5,
                ],
                [
                    'id' => 1001,
                    'group' => 11,
                    'distance' => 8,
                ],
            ],
            'expectedResult' => [
                [
                    'id' => 1000,
                    'group' => 10,
                    'distance' => 1,
                ],
                [
                    'id' => 1001,
                    'group' => 11,
                    'distance' => 5,
                ],
            ],
        ];

        yield [
            'rawCollection' => [
                [
                    'id' => 1000,
                    'group' => 10,
                    'distance' => 7,
                ],
                [
                    'id' => 1000,
                    'group' => 10,
                    'distance' => 1,
                ],
                [
                    'id' => 1001,
                    'group' => 11,
                    'distance' => 8,
                ],
                [
                    'id' => 1001,
                    'group' => 11,
                    'distance' => 5,
                ],
            ],
            'expectedResult' => [
                [
                    'id' => 1000,
                    'group' => 10,
                    'distance' => 1,
                ],
                [
                    'id' => 1001,
                    'group' => 11,
                    'distance' => 5,
                ],
            ],
        ];
    }
}