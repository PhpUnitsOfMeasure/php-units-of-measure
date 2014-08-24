<?php

namespace PhpUnitsOfMeasureTest\PhysicalQuantity;

abstract class AbstractPhysicalQuantityTestCase extends \PHPUnit_Framework_TestCase
{
    protected $supportedUnitsWithAliases = [];

    /**
     * Build a test object of the target physical quantity.
     *
     * @return PhysicalQuantity
     */
    abstract protected function instantiateTestQuantity();

    /**
     * This test is here to help make sure the tests are in sync with the code
     */
    public function testSupportedUnits()
    {
        $this->assertEquals(
            $this->supportedUnitsWithAliases,
            $this->instantiateTestQuantity()->getSupportedUnits(true)
        );
    }

    /**
     * Verify that the object instantiates without error.
     */
    public function testConstructorSucceeds()
    {
        $this->instantiateTestQuantity();
    }
}
