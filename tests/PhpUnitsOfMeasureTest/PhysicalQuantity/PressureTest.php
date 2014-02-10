<?php

namespace PhpUnitsOfMeasureTest\PhysicalQuantity;

use PhpUnitsOfMeasure\PhysicalQuantity\Pressure;

class PressureTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Verify that the object instantiates without error.
     *
     * @covers \PhpUnitsOfMeasure\PhysicalQuantity\Pressure::__construct()
     */
    public function testConstructorSucceeds()
    {
        $target = new Pressure(1, 'Pa');
    }
}
