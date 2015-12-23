<?php

namespace PhpUnitsOfMeasureTest\PhysicalQuantity;

use PhpUnitsOfMeasure\PhysicalQuantity\SolidAngle;

class SolidAngleTest extends AbstractPhysicalQuantityTestCase
{
    protected $supportedUnitsWithAliases = [
        'sr',
        'steradian',
        'steradians',
        'Ysr',
        'yottasteradian',
        'yottasteradians',
        'Zsr',
        'zettasteradian',
        'zettasteradians',
        'Esr',
        'exasteradian',
        'exasteradians',
        'Psr',
        'petasteradian',
        'petasteradians',
        'Tsr',
        'terasteradian',
        'terasteradians',
        'Gsr',
        'gigasteradian',
        'gigasteradians',
        'Msr',
        'megasteradian',
        'megasteradians',
        'ksr',
        'kilosteradian',
        'kilosteradians',
        'hsr',
        'hectosteradian',
        'hectosteradians',
        'dasr',
        'decasteradian',
        'decasteradians',
        'dsr',
        'decisteradian',
        'decisteradians',
        'csr',
        'centisteradian',
        'centisteradians',
        'msr',
        'millisteradian',
        'millisteradians',
        'µsr',
        'microsteradian',
        'microsteradians',
        'nsr',
        'nanosteradian',
        'nanosteradians',
        'psr',
        'picosteradian',
        'picosteradians',
        'fsr',
        'femtosteradian',
        'femtosteradians',
        'asr',
        'attosteradian',
        'attosteradians',
        'zsr',
        'zeptosteradian',
        'zeptosteradians',
        'ysr',
        'yoctosteradian',
        'yoctosteradians',
    ];

    protected function instantiateTestQuantity()
    {
        return new SolidAngle(1, 'steradian');
    }
}
