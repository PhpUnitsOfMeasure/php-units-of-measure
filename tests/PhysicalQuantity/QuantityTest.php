<?php

namespace PhpUnitsOfMeasureTest\PhysicalQuantity;

use PhpUnitsOfMeasure\PhysicalQuantity\Quantity;
use PhpUnitsOfMeasure\PhysicalQuantityInterface;

class QuantityTest extends AbstractPhysicalQuantityTestCase
{
    protected array $supportedUnitsWithAliases = [
        'mol',
        'mole',
        'moles',
        'Ymol',
        'yottamole',
        'yottamoles',
        'Zmol',
        'zettamole',
        'zettamoles',
        'Emol',
        'examole',
        'examoles',
        'Pmol',
        'petamole',
        'petamoles',
        'Tmol',
        'teramole',
        'teramoles',
        'Gmol',
        'gigamole',
        'gigamoles',
        'Mmol',
        'megamole',
        'megamoles',
        'kmol',
        'kilomole',
        'kilomoles',
        'hmol',
        'hectomole',
        'hectomoles',
        'damol',
        'decamole',
        'decamoles',
        'dmol',
        'decimole',
        'decimoles',
        'cmol',
        'centimole',
        'centimoles',
        'mmol',
        'millimole',
        'millimoles',
        'µmol',
        'micromole',
        'micromoles',
        'nmol',
        'nanomole',
        'nanomoles',
        'pmol',
        'picomole',
        'picomoles',
        'fmol',
        'femtomole',
        'femtomoles',
        'amol',
        'attomole',
        'attomoles',
        'zmol',
        'zeptomole',
        'zeptomoles',
        'ymol',
        'yoctomole',
        'yoctomoles',
    ];

    protected function instantiateTestQuantity(): PhysicalQuantityInterface
    {
        return new Quantity(1, 'mol');
    }

    public function testToMilli(): void
    {
        $value = new Quantity(1, 'mol');
        $this->assertEqualsWithDelta(1000, $value->toUnit('mmol'), 0.000001);
    }

    public function testToKilo(): void
    {
        $value = new Quantity(1, 'mol');
        $this->assertEqualsWithDelta(0.001, $value->toUnit('kmol'), 0.000001);
    }
}
