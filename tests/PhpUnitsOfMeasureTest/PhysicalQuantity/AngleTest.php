<?php

namespace PhpUnitsOfMeasureTest\PhysicalQuantity;

use PhpUnitsOfMeasure\PhysicalQuantity\Angle;

class AngleTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Verify that the object instantiates without error.
     *
     * @covers \PhpUnitsOfMeasure\PhysicalQuantity\Angle\__construct()
     */
    public function testConstructorSucceeds()
    {
        $target = new Angle(1, 'deg');
    }

    public function testToDegrees()
    {
        $angle = new Angle(2 * M_PI, 'rads');
        $this->assertEquals(360, $angle->toUnit('deg'));
    }

    public function testToRadians()
    {
        $angle = new Angle(720, 'degree');
        $this->assertEquals(M_PI * 4, $angle->toUnit('rad'));
    }
}
