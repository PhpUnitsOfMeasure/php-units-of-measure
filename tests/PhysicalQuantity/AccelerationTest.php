<?php

namespace PhpUnitsOfMeasureTest\PhysicalQuantity;

use PhpUnitsOfMeasure\PhysicalQuantity\Acceleration;
use PhpUnitsOfMeasure\PhysicalQuantityInterface;

class AccelerationTest extends AbstractPhysicalQuantityTestCase
{
    protected array $supportedUnitsWithAliases = [
        'm/s^2',
        'm/s²',
        'meter per second squared',
        'meters per second squared',
        'metre per second squared',
        'metres per second squared',
    ];

    protected function instantiateTestQuantity(): PhysicalQuantityInterface
    {
        return new Acceleration(1, 'm/s^2');
    }
}
