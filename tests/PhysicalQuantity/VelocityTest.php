<?php

namespace PhpUnitsOfMeasureTest\PhysicalQuantity;

use PhpUnitsOfMeasure\PhysicalQuantity\Velocity;

class VelocityTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Verify that the object instantiates without error.
     *
     * @covers \PhpUnitsOfMeasure\PhysicalQuantity\Velocity::__construct()
     */
    public function testConstructorSucceeds()
    {
        $target = new Velocity(1, 'm/s');
    }
}
