<?php

namespace PhpUnitsOfMeasureTest\PhysicalQuantity;

use PhpUnitsOfMeasure\PhysicalQuantity\Quantity;

class QuantityTest extends AbstractPhysicalQuantityTestCase
{
    protected $supportedUnitsWithAliases = [
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

    protected function instantiateTestQuantity()
    {
        return new Quantity(1, 'mol');
    }
}
