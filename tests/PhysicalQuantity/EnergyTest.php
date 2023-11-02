<?php

namespace PhpUnitsOfMeasureTest\PhysicalQuantity;

use PhpUnitsOfMeasure\PhysicalQuantity\Energy;
use PhpUnitsOfMeasure\PhysicalQuantityInterface;

class EnergyTest extends AbstractPhysicalQuantityTestCase
{
    protected array $supportedUnitsWithAliases = [
        'Wh',
        'watt hour',
        'watt hours',
        'µWh',
        'microwatt hour',
        'microwatt hours',
        'mWh',
        'milliwatt hour',
        'milliwatt hours',
        'kWh',
        'kilowatt hour',
        'kilowatt hours',
        'MWh',
        'megawatt hour',
        'megawatt hours',
        'GWh',
        'gigawatt hour',
        'gigawatt hours',
        'TWh',
        'terawatt hour',
        'terawatt hours',
        'PWh',
        'petawatt hour',
        'petawatt hours',

        'µJ',
        'microjoule',
        'microjoules',
        'mJ',
        'millijoule',
        'millijoules',
        'J',
        'joule',
        'joules',
        'kJ',
        'kilojoule',
        'kilojoules',
        'MJ',
        'megajoule',
        'megajoules',
        'GJ',
        'gigajoule',
        'gigajoules',
        'TJ',
        'terajoule',
        'terajoules',
        'PJ',
        'petajoule',
        'petajoules',
    ];

    protected function instantiateTestQuantity(): PhysicalQuantityInterface
    {
        return new Energy(1, 'Wh');
    }

    public function testToKilowattHour(): void
    {
        $quantity = new Energy(1000, 'Wh');
        $this->assertEquals(1, $quantity->toUnit('kWh'));
    }

    public function testToWattHour(): void
    {
        $quantity = new Energy(1, 'kWh');
        $this->assertEquals(1000, $quantity->toUnit('Wh'));
    }

    public function testToMegaJoule(): void
    {
        $quantity = new Energy(1, 'kWh');
        $this->assertEquals(3.6, $quantity->toUnit('megajoule'));
    }

    public function testToJoule(): void
    {
        $quantity = new Energy(1, 'Wh');
        $this->assertEquals(3600, $quantity->toUnit('joule'));
    }
}
