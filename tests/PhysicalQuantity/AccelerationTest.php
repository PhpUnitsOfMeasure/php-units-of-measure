<?php

namespace PhpUnitsOfMeasureTest\PhysicalQuantity;

use PhpUnitsOfMeasure\PhysicalQuantity\Acceleration;

class AccelerationTest extends AbstractPhysicalQuantityTestCase
{
    protected $supportedUnitsWithAliases = [
        'm/s^2',
        'm/s²',
        'meter per second squared',
        'meters per second squared',
        'metre per second squared',
        'metres per second squared',
    ];

    protected function instantiateTestQuantity()
    {
        return new Acceleration(1, 'm/s^2');
    }
}
