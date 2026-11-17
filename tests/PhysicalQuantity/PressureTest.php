<?php

namespace PhpUnitsOfMeasureTest\PhysicalQuantity;

use PhpUnitsOfMeasure\PhysicalQuantity\Pressure;
use PhpUnitsOfMeasure\PhysicalQuantityInterface;

class PressureTest extends AbstractPhysicalQuantityTestCase
{
    protected array $supportedUnitsWithAliases = [
        'Pa',
        'pascal',
        'YPa',
        'yottapascal',
        'ZPa',
        'zettapascal',
        'EPa',
        'exapascal',
        'PPa',
        'petapascal',
        'TPa',
        'terapascal',
        'GPa',
        'gigapascal',
        'MPa',
        'megapascal',
        'kPa',
        'kilopascal',
        'hPa',
        'hectopascal',
        'daPa',
        'decapascal',
        'dPa',
        'decipascal',
        'cPa',
        'centipascal',
        'mPa',
        'millipascal',
        'µPa',
        'micropascal',
        'nPa',
        'nanopascal',
        'pPa',
        'picopascal',
        'fPa',
        'femtopascal',
        'aPa',
        'attopascal',
        'zPa',
        'zeptopascal',
        'yPa',
        'yoctopascal',
        'at',
        'atm',
        'atmosphere',
        'atmospheres',
        'bar',
        'Ybar',
        'Zbar',
        'Ebar',
        'Pbar',
        'Tbar',
        'Gbar',
        'Mbar',
        'kbar',
        'hbar',
        'dabar',
        'dbar',
        'cbar',
        'mbar',
        'µbar',
        'nbar',
        'pbar',
        'fbar',
        'abar',
        'zbar',
        'ybar',
        'inHg',
        'inches of mercury',
        'mmHg',
        'millimeters of mercury',
        'millimetres of mercury',
        'torr',
        'psi',
        'ksi',
        'Mpsi',
        'pounds per square inch',
    ];

    protected function instantiateTestQuantity(): PhysicalQuantityInterface
    {
        return new Pressure(1, 'Pa');
    }

    public function testToAtmospheres(): void
    {
        $value = new Pressure(101325, 'Pa');
        $this->assertEqualsWithDelta(1, $value->toUnit('atm'), 0.000001);
    }

    public function testToTechnicalAtmospheres(): void
    {
        $value = new Pressure(98066.5, 'Pa');
        $this->assertEqualsWithDelta(1, $value->toUnit('at'), 0.000001);
    }

    public function testToTorr(): void
    {
        $value = new Pressure(101325, 'Pa');
        $this->assertEqualsWithDelta(760, $value->toUnit('torr'), 0.000001);
    }

    public function testToBar(): void
    {
        $value = new Pressure(100000, 'Pa');
        $this->assertEqualsWithDelta(1, $value->toUnit('bar'), 0.000001);
    }

    public function testToMillibar(): void
    {
        $value = new Pressure(100000, 'Pa');
        $this->assertEqualsWithDelta(1000, $value->toUnit('mbar'), 0.000001);
    }

    public function testToKilopascal(): void
    {
        $value = new Pressure(100000, 'Pa');
        $this->assertEqualsWithDelta(100, $value->toUnit('kPa'), 0.000001);
    }

    public function testToInchesOfMercury(): void
    {
        $value = new Pressure(101325, 'Pa');
        $this->assertEqualsWithDelta(29.921, $value->toUnit('inHg'), 0.001);
    }

    public function testToMillimetersOfMercury(): void
    {
        $value = new Pressure(101325, 'Pa');
        $this->assertEqualsWithDelta(760, $value->toUnit('mmHg'), 0.001);
    }

    public function testToPsi(): void
    {
        $value = new Pressure(101325, 'Pa');
        $this->assertEqualsWithDelta(14.6959, $value->toUnit('psi'), 0.0001);
    }

    public function testToKsi(): void
    {
        $value = new Pressure(6894757.293168, 'Pa');
        $this->assertEqualsWithDelta(1, $value->toUnit('ksi'), 0.000001);
    }

    public function testToMpsi(): void
    {
        $value = new Pressure(6894757293.168, 'Pa');
        $this->assertEqualsWithDelta(1, $value->toUnit('Mpsi'), 0.000001);
    }
}
