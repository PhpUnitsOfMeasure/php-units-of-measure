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
}
