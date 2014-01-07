<?php

namespace PhpUnitsOfMeasureTest\PhysicalQuantity;

use PhpUnitsOfMeasure\PhysicalQuantity\Acceleration;

class AccelerationTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Verify that the object instantiates without error.
     *
     * @covers \PhpUnitsOfMeasure\PhysicalQuantity\Acceleration\__construct()
     */
    public function testConstructorSucceeds()
    {
        $target = new Acceleration(1, 'm/s^2');
    }
}
