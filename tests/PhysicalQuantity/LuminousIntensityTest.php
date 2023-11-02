<?php

namespace PhpUnitsOfMeasureTest\PhysicalQuantity;

use PhpUnitsOfMeasure\PhysicalQuantity\LuminousIntensity;
use PhpUnitsOfMeasure\PhysicalQuantityInterface;

class LuminousIntensityTest extends AbstractPhysicalQuantityTestCase
{
    protected array $supportedUnitsWithAliases = [
        'cd',
        'candela',
        'Ycd',
        'yottacandela',
        'Zcd',
        'zettacandela',
        'Ecd',
        'exacandela',
        'Pcd',
        'petacandela',
        'Tcd',
        'teracandela',
        'Gcd',
        'gigacandela',
        'Mcd',
        'megacandela',
        'kcd',
        'kilocandela',
        'hcd',
        'hectocandela',
        'dacd',
        'decacandela',
        'dcd',
        'decicandela',
        'ccd',
        'centicandela',
        'mcd',
        'millicandela',
        'µcd',
        'microcandela',
        'ncd',
        'nanocandela',
        'pcd',
        'picocandela',
        'fcd',
        'femtocandela',
        'acd',
        'attocandela',
        'zcd',
        'zeptocandela',
        'ycd',
        'yoctocandela',
    ];

    protected function instantiateTestQuantity(): PhysicalQuantityInterface
    {
        return new LuminousIntensity(1, 'cd');
    }
}
