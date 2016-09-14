<?php

namespace PhpUnitsOfMeasureTest\PhysicalQuantity;

use PhpUnitsOfMeasure\PhysicalQuantity\Force;

class ForceTest extends AbstractPhysicalQuantityTestCase
{
    protected $supportedUnitsWithAliases = [
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
