<?php

namespace PhpUnitsOfMeasureTest\PhysicalQuantity;

use PHPUnit_Framework_TestCase;

/**
 * This is a parent class for all the PhysicalQuantity childrens' test cases.
 */
abstract class AbstractPhysicalQuantityTestCase extends PHPUnit_Framework_TestCase
{
    protected $supportedUnitsWithAliases = [];

    /**
     * Verify that the object instantiates without error.
     */
    public function testConstructorSucceeds()
    {
        $this->instantiateTestQuantity();
    }

    /**
     * Convert to each of the known supported units, verifying that no
     * exceptions are thrown.
     */
    public function testSupportedUnits()
    {
        $quantity = $this->instantiateTestQuantity();

        foreach ($this->supportedUnitsWithAliases as $unit) {
            $quantity->toUnit($unit);
        }
    }

    /**
     * Build a test object of the target physical quantity.
     *
     * @return PhysicalQuantityInterface
     */
    abstract protected function instantiateTestQuantity();
}
