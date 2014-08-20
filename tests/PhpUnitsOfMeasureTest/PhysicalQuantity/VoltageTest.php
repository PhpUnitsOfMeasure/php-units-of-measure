<?php

namespace PhpUnitsOfMeasureTest\PhysicalQuantity;

use PhpUnitsOfMeasure\PhysicalQuantity\Voltage;

class ElectricCurrentTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Verify that the object instantiates without error.
     *
     * @covers \PhpUnitsOfMeasure\PhysicalQuantity\Voltage::__construct()
     */
    public function testConstructorSucceeds()
    {
        $target = new Voltage(1, 'V');
    }
}
