<?php


namespace App;


class SupplierGrouper
{
    public function group(array $rawCollection): array
    {
        $closestSuppliersWithoutGroup = $this->getClosestSuppliersWithoutGroup($rawCollection);
        $closestSuppliersFromGroup = $this->getClosestGroupedSupplier($rawCollection);

        return array_merge($closestSuppliersFromGroup, array_values($closestSuppliersWithoutGroup));
    }

    private function getClosestGroupedSupplier(array $rawCollection): array
    {
        $groupedSuppliers = $this->getGroupedSupplierWithClosestBranch($rawCollection);

        return $this->getClosestSupplierFromGroup($groupedSuppliers);
    }

    private function getClosestSuppliersWithoutGroup(array $rawCollection): array
    {
        $closestSuppliersWithoutGroup = [];

        foreach ($rawCollection as $supplier) {
            $groupId = $supplier['group'];
            $supplierId = $supplier['id'];

            if ($groupId === null) {
                if (isset($closestSuppliersWithoutGroup[$supplierId])) {
                    $closestSuppliersWithoutGroup[$supplierId] = $this->getCloserSupplier(
                        $supplier,
                        $closestSuppliersWithoutGroup[$supplierId]
                    );
                } else {
                    $closestSuppliersWithoutGroup[$supplierId] = $supplier;
                }
            }
        }

        return $closestSuppliersWithoutGroup;
    }

    private function getGroupedSupplierWithClosestBranch(array $rawCollection): array
    {
        $groupedSuppliers = [];

        foreach ($rawCollection as $supplier) {
            $groupId = $supplier['group'];
            $supplierId = $supplier['id'];

            if ($groupId !== null) {
                if (isset($groupedSuppliers[$groupId][$supplierId])) {
                    $groupedSuppliers[$groupId][$supplierId] = $this->getCloserSupplier(
                        $supplier,
                        $groupedSuppliers[$groupId][$supplierId]
                    );
                } else {
                    $groupedSuppliers[$groupId][$supplierId] = $supplier;
                }
            }
        }

        return $groupedSuppliers;
    }

    private function getCloserSupplier(array $firstSupplier, array $secondSupplier): array
    {
        if ($this->extractDistanceFromSupplier($firstSupplier) < $this->extractDistanceFromSupplier($secondSupplier)) {
            $closerSupplier = $firstSupplier;
        } else {
            $closerSupplier = $secondSupplier;
        }

        return $closerSupplier;
    }

    private function extractDistanceFromSupplier(array $supplier)
    {
        return $supplier['distance'];
    }

    /**
     * @param array $groupedSuppliers
     *
     * @return array
     */
    private function getClosestSupplierFromGroup(array $groupedSuppliers): array
    {
        $closestSuppliersFromGroup = [];
        foreach ($groupedSuppliers as $suppliersInsideGroup) {
            $closestSupplier = null;

            if (count($suppliersInsideGroup) === 1) {
                $closestSupplier = $suppliersInsideGroup[array_key_first($suppliersInsideGroup)];
            } else {
                foreach ($suppliersInsideGroup as $supplier) {
                    if ($closestSupplier === null) {
                        $closestSupplier = $supplier;
                    } else {
                        $closestSupplier = $this->getCloserSupplier(
                            $supplier,
                            $closestSupplier
                        );
                    }
                }
            }

            $closestSuppliersFromGroup[] = $closestSupplier;
        }

        return $closestSuppliersFromGroup;
    }
}