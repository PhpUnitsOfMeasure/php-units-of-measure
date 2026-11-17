<?php

namespace PhpUnitsOfMeasureTest\PhysicalQuantity;

use PhpUnitsOfMeasure\PhysicalQuantity\Length;
use PhpUnitsOfMeasure\PhysicalQuantityInterface;

class LengthTest extends AbstractPhysicalQuantityTestCase
{
    protected array $supportedUnitsWithAliases = [
        'm',
        'meter',
        'meters',
        'metre',
        'metres',
        'Ym',
        'yottameter',
        'yottameters',
        'yottametre',
        'yottametres',
        'Zm',
        'zettameter',
        'zettameters',
        'zettametre',
        'zettametres',
        'Em',
        'exameter',
        'exameters',
        'exametre',
        'exametres',
        'Pm',
        'petameter',
        'petameters',
        'petametre',
        'petametres',
        'Tm',
        'terameter',
        'terameters',
        'terametre',
        'terametres',
        'Gm',
        'gigameter',
        'gigameters',
        'gigametre',
        'gigametres',
        'Mm',
        'megameter',
        'megameters',
        'megametre',
        'megametres',
        'km',
        'kilometer',
        'kilometers',
        'kilometre',
        'kilometres',
        'hm',
        'hectometer',
        'hectometers',
        'hectometre',
        'hectometres',
        'dam',
        'decameter',
        'decameters',
        'decametre',
        'decametres',
        'dm',
        'decimeter',
        'decimeters',
        'decimetre',
        'decimetres',
        'cm',
        'centimeter',
        'centimeters',
        'centimetre',
        'centimetres',
        'mm',
        'millimeter',
        'millimeters',
        'millimetre',
        'millimetres',
        'µm',
        'micrometer',
        'micrometers',
        'micrometre',
        'micrometres',
        'nm',
        'nanometer',
        'nanometers',
        'nanometre',
        'nanometres',
        'pm',
        'picometer',
        'picometers',
        'picometre',
        'picometres',
        'fm',
        'femtometer',
        'femtometers',
        'femtometre',
        'femtometres',
        'am',
        'attometer',
        'attometers',
        'attometre',
        'attometres',
        'zm',
        'zeptometer',
        'zeptometers',
        'zeptometre',
        'zeptometres',
        'ym',
        'yoctometer',
        'yoctometers',
        'yoctometre',
        'yoctometres',
        'ft',
        'foot',
        'feet',
        'in',
        'inch',
        'inches',
        'mi',
        'mile',
        'miles',
        'yd',
        'yard',
        'yards',
        'M',
        'NM',
        'nmi',
        'nautical mile',
        'mil',
        'AU',
        'au',
        'astronomical unit',
        'astronomical units',
    ];

    protected function instantiateTestQuantity(): PhysicalQuantityInterface
    {
        return new Length(1, 'm');
    }

    public function testToMillimeters(): void
    {
        $quantity = new Length(5, 'm');
        $this->assertEquals(5000, $quantity->toUnit('mm'));
    }

    public function testToMegameters(): void
    {
        $quantity = new Length(5, 'm');
        $this->assertEquals(5/1e6, $quantity->toUnit('Mm'));
    }

    public function testToInches(): void
    {
        $quantity = new Length(2, 'ft');
        $this->assertEquals(24, round($quantity->toUnit('in')));
    }

    public function testToNauticalMiles(): void
    {
        $quantity = new Length(3704, 'm');
        $this->assertEquals(2, $quantity->toUnit('nmi'));
    }

    public function testToScandinavianMil(): void
    {
        $quantity = new Length(20000, 'm');
        $this->assertEquals(2, $quantity->toUnit('mil'));
    }

    public function testToAstronomicalUnit(): void
    {
        $quantity = new Length(150000000, 'km');
        $this->assertEquals(1.0026880683402668, $quantity->toUnit('AU'));
    }
}
