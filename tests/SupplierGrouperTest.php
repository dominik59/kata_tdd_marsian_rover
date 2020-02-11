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

    public function testGroupedSuppliersWithBranchesShouldReturnOneClosestInGroupAndInBranch(): void
    {
        //given
        $rawCollection = [
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
                [
                    'id' => 1001,
                    'group' => 11,
                    'distance' => 5,
                ],
            ],
            $groupedSuppliers
        );
    }
}