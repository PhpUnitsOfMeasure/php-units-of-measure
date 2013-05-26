<?php

namespace PhpUnitsOfMeasure\PhysicalQuantity;

class AngleTest extends \PHPUnit_Framework_TestCase
{

    public function testToDegrees()
    {
        $angle = new Angle(2 * M_PI, 'rads');
        $this->assertEquals(360, $angle->toUnit('deg'));
    }

}
