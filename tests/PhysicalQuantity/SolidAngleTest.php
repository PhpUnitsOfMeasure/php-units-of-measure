<?php

namespace PhpUnitsOfMeasureTest\PhysicalQuantity;

use PhpUnitsOfMeasure\PhysicalQuantity\SolidAngle;
use PhpUnitsOfMeasure\PhysicalQuantityInterface;

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

    protected function instantiateTestQuantity(): PhysicalQuantityInterface
    {
        return new SolidAngle(1, 'steradian');
    }

    public function testToMilli(): void
    {
        $value = new SolidAngle(1, 'sr');
        $this->assertEqualsWithDelta(1000, $value->toUnit('msr'), 0.000001);
    }

    public function testToKilo(): void
    {
        $value = new SolidAngle(1, 'sr');
        $this->assertEqualsWithDelta(0.001, $value->toUnit('ksr'), 0.000001);
    }
}
