<?php

namespace PhpUnitsOfMeasureTest\PhysicalQuantity;

use PhpUnitsOfMeasure\PhysicalQuantity\Frequency;

class FrequencyTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Verify that the object instantiates without error.
     *
     * @covers \PhpUnitsOfMeasure\PhysicalQuantity\Frequency::__construct()
     */
    public function testConstructorSucceeds()
    {
        $target = new Frequency(1, 'Hz');
    }
}
