<?php

namespace PhpUnitsOfMeasureTest\PhysicalQuantity;

use PhpUnitsOfMeasure\PhysicalQuantity\Temperature;

class TemperatureTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Verify that the object instantiates without error.
     *
     * @covers \PhpUnitsOfMeasure\PhysicalQuantity\Temperature::__construct()
     */
    public function testConstructorSucceeds()
    {
        $target = new Temperature(1, 'K');
    }
}
