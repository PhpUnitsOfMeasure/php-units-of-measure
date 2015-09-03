<?php

namespace PhpUnitsOfMeasureTest\PhysicalQuantity;

use PhpUnitsOfMeasure\PhysicalQuantity\Velocity;

class VelocityTest extends AbstractPhysicalQuantityTestCase
{
    protected $supportedUnitsWithAliases = [
        'm/s',
        'meters/sec',
        'meters per second',
        'meter per second',
        'metres per second',
        'metre per second',
        'km/h',
        'km/hour',
        'kilometer per hour',
        'kilometers per hour',
        'kilometre per hour',
        'kilometres per hour',
        'ft/s',
        'feet/sec',
        'feet per second',
        'mph',
        'miles/hour',
        'miles per hour',
        'knot',
        'knots',
    ];

    protected function instantiateTestQuantity()
    {
        return new Velocity(1, 'm/s');
    }

    public function testToKilometersPerHour()
    {
        $speed = new Velocity(1, 'km/h');
        $this->assertEquals(0.277778, $speed->toUnit('m/s')->getValue());
    }

    public function testToFeetPerSecond()
    {
        $speed = new Velocity(2, 'm/s');
        $this->assertEquals(6.561679790026246, $speed->toUnit('ft/s')->getValue());
    }

    public function testToKmPerHour()
    {
        $speed = new Velocity(2, 'mph');
        $this->assertEquals(3.2186854250516594, $speed->toUnit('km/h')->getValue());
    }

    public function testToKnot()
    {
        $speed = new Velocity(2, 'm/s');
        $this->assertEquals(3.8876923435786983, $speed->toUnit('knot')->getValue());
    }
}
