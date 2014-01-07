<?php

namespace PhpUnitsOfMeasureTest\PhysicalQuantity;

use PhpUnitsOfMeasure\PhysicalQuantity\ElectricCurrent;

class ElectricCurrentTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Verify that the object instantiates without error.
     *
     * @covers \PhpUnitsOfMeasure\PhysicalQuantity\ElectricCurrent\__construct()
     */
    public function testConstructorSucceeds()
    {
        $target = new ElectricCurrent(1, 'A');
    }
}
