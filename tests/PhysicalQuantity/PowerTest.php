<?php

namespace PhpUnitsOfMeasureTest\PhysicalQuantity;

use PhpUnitsOfMeasure\PhysicalQuantity\Power;

class PowerTest extends AbstractPhysicalQuantityTestCase
{
    protected $supportedUnitsWithAliases = [
        'W',
        'watt',
        'watts',
        'kW',
        'kilowatt',
        'kilowatts',
        'mW',
        'milliwatt',
        'milliwatts',
        'PS',
        'pferdestärke',
    ];

    protected function instantiateTestQuantity()
    {
        return new Power(1, 'W');
    }

    public function testToPS()
    {
        $quantity = new Power(1, 'kW');
        $this->assertEquals(1.3596216173039044, $quantity->toUnit('PS'));
    }
}
