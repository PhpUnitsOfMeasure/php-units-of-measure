<?php

namespace PhpUnitsOfMeasureTest\PhysicalQuantity;

use PhpUnitsOfMeasure\PhysicalQuantity\Velocity;

class VelocityTest extends AbstractPhysicalQuantityTestCase
{
    protected $supportedUnitsWithAliases = [
        'm/s',
        'meters per second',
        'meter per second',
        'metres per second',
        'metre per second',
    ];

    protected function instantiateTestQuantity()
    {
        return new Velocity(1, 'm/s');
    }
}
