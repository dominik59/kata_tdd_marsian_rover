<?php


namespace Test;


use App\SupplierGrouper;
use PHPUnit\Framework\TestCase;

class SupplierGrouperTest extends TestCase
{
    public function testReturnJustOneSupplierWhenOneProvided()
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
                'id' => 1000,
                'group' => null,
                'distance' => 1,
            ],
            $groupedSuppliers
        );
    }
}