<?php

namespace PhpUnitsOfMeasureTest\PhysicalQuantity;

use PhpUnitsOfMeasure\PhysicalQuantity\Power;
use PhpUnitsOfMeasure\PhysicalQuantityInterface;

class PowerTest extends AbstractPhysicalQuantityTestCase
{
    protected array $supportedUnitsWithAliases = [
        'W',
        'watt',
        'watts',
        'µW',
        'microwatt',
        'microwatts',
        'mW',
        'milliwatt',
        'milliwatts',
        'kW',
        'kilowatt',
        'kilowatts',
        'MW',
        'megawatt',
        'megawatts',
        'GW',
        'gigawatt',
        'gigawatts',
        'TW',
        'terawatt',
        'terawatts',
        'PW',
        'petawatt',
        'petawatts',
    ];

    protected function instantiateTestQuantity(): PhysicalQuantityInterface
    {
        return new Power(1, 'W');
    }

    public function testToKilowatt(): void
    {
        $quantity = new Power(1000, 'W');
        $this->assertEquals(1, $quantity->toUnit('kW'));
    }

    public function testToWatt(): void
    {
        $quantity = new Power(1, 'kW');
        $this->assertEquals(1000, $quantity->toUnit('W'));
    }

    public function testToDecibelsMilliWatt(): void
    {
        $quantity = new Power(0.01, 'mW');
        $this->assertEquals(-20, $quantity->toUnit('dBm'));
        $quantity = new Power(1, 'mW');
        $this->assertEquals(0, $quantity->toUnit('dBm'));
        $quantity = new Power(10, 'kW');
        $this->assertEquals(70, $quantity->toUnit('dBm'));
    }

    public function testFromDecibelsMilliWatt(): void
    {
        $quantity = new Power(-20, 'dBm');
        $this->assertEquals(0.00001, $quantity->toUnit('W'));
        $quantity = new Power(0, 'dBm');
        $this->assertEquals(0.001, $quantity->toUnit('W'));
        $quantity = new Power(70, 'dBm');
        $this->assertEquals(10000, $quantity->toUnit('W'));
    }
}
