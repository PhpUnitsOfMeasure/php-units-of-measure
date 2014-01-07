<?php

namespace PhpUnitsOfMeasureTest\PhysicalQuantity;

use PhpUnitsOfMeasure\PhysicalQuantity\LuminousIntensity;

class LuminousIntensityTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Verify that the object instantiates without error.
     *
     * @covers \PhpUnitsOfMeasure\PhysicalQuantity\LuminousIntensity::__construct()
     */
    public function testConstructorSucceeds()
    {
        $target = new LuminousIntensity(1, 'cd');
    }
}
