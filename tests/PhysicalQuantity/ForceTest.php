<?php

namespace PhpUnitsOfMeasureTest\PhysicalQuantity;

use PhpUnitsOfMeasure\PhysicalQuantity\Force;

class ForceTest extends AbstractPhysicalQuantityTestCase
{
    protected $supportedUnitsWithAliases = [
        'N',
        'newton',
        'newtons',
        'kN',
        'kilonewton',
        'kilonewtons',
        'kip',
        'kips'
    ];

    protected function instantiateTestQuantity()
    {
        return new Length(1, 'N');
    }

    public function testToNewton()
    {
        $quantity = new Length(1, 'kip');
        $this->assertEquals(4448.2216, $quantity->toUnit('N'));
    }

    public function testToKilonewton()
    {
        $quantity = new Length(5, 'N');
        $this->assertEquals(5000, $quantity->toUnit('kN'));
    }

    public function testToKip()
    {
        $quantity = new Length(800, 'kN');
        $this->assertEquals(179.8471550968, $quantity->toUnit('kip'));
    }
}
