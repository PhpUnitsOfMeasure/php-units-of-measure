<?php

namespace PhpUnitsOfMeasureTest\PhysicalQuantity;

use PhpUnitsOfMeasure\PhysicalQuantity\Volume;

class VolumeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Verify that the object instantiates without error.
     *
     * @covers \PhpUnitsOfMeasure\PhysicalQuantity\Volume::__construct()
     */
    public function testConstructorSucceeds()
    {
        $target = new Volume(1, 'm^3');
    }
}
