<?php

namespace PhpUnitsOfMeasureTest\PhysicalQuantity;

use PhpUnitsOfMeasure\PhysicalQuantity\Velocity;
use PhpUnitsOfMeasure\PhysicalQuantityInterface;

class VelocityTest extends AbstractPhysicalQuantityTestCase
{
    protected array $supportedUnitsWithAliases = [
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

    protected function instantiateTestQuantity(): PhysicalQuantityInterface
    {
        return new Velocity(1, 'm/s');
    }

    public function testToKilometersPerHour(): void
    {
        $speed = new Velocity(1, 'km/h');
        $this->assertEquals(0.277778, $speed->toUnit('m/s'));
    }

    public function testToFeetPerSecond(): void
    {
        $speed = new Velocity(2, 'm/s');
        $this->assertEquals(6.561679790026246, $speed->toUnit('ft/s'));
    }

    public function testToKmPerHour(): void
    {
        $speed = new Velocity(2, 'mph');
        $this->assertEquals(3.2186854250516594, $speed->toUnit('km/h'));
    }

    public function testToKnot(): void
    {
        $speed = new Velocity(2, 'm/s');
        $this->assertEquals(3.8876923435786983, $speed->toUnit('knot'));
    }
}
