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

    public function testToKiloMeterPerSecond()
    {
        $value = new Acceleration(1000, 'm/s^2');
        $this->assertEquals(1, $value->toUnit('km/s^2'));
    }

    public function testToMilliMeterPerSecond()
    {
        $value = new Acceleration(1, 'm/s^2');
        $this->assertEquals(1000, $value->toUnit('mm/s^2'));
    }
}
