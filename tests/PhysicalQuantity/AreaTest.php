<?php

namespace PhpUnitsOfMeasureTest\PhysicalQuantity;

use PhpUnitsOfMeasure\PhysicalQuantity\Area;

class AreaTest extends AbstractPhysicalQuantityTestCase
{
    protected $supportedUnitsWithAliases = [
        'm^2',
        'm²',
        'meter squared',
        'meters squared',
        'metre squared',
        'metres squared',

        'Ym^2',
        'Ym²',
        'yottameter squared',
        'yottameters squared',
        'yottametre squared',
        'yottametres squared',
        'Zm^2',
        'Zm²',
        'zettameter squared',
        'zettameters squared',
        'zettametre squared',
        'zettametres squared',
        'Em^2',
        'Em²',
        'exameter squared',
        'exameters squared',
        'exametre squared',
        'exametres squared',
        'Pm^2',
        'Pm²',
        'petameter squared',
        'petameters squared',
        'petametre squared',
        'petametres squared',
        'Tm^2',
        'Tm²',
        'terameter squared',
        'terameters squared',
        'terametre squared',
        'terametres squared',
        'Gm^2',
        'Gm²',
        'gigameter squared',
        'gigameters squared',
        'gigametre squared',
        'gigametres squared',
        'Mm^2',
        'Mm²',
        'megameter squared',
        'megameters squared',
        'megametre squared',
        'megametres squared',
        'km^2',
        'km²',
        'kilometer squared',
        'kilometers squared',
        'kilometre squared',
        'kilometres squared',

        'hm^2',
        'hm²',
        'hectometer squared',
        'hectometers squared',
        'hectometre squared',
        'hectometres squared',
        'dam^2',
        'dam²',
        'decameter squared',
        'decameters squared',
        'decametre squared',
        'decametres squared',
        'dm^2',
        'dm²',
        'decimeter squared',
        'decimeters squared',
        'decimetre squared',
        'decimetres squared',
        'cm^2',
        'cm²',
        'centimeter squared',
        'centimeters squared',
        'centimetre squared',
        'centimetres squared',
        'mm^2',
        'mm²',
        'millimeter squared',
        'millimeters squared',
        'millimetre squared',
        'millimetres squared',

        'µm^2',
        'µm²',
        'micrometer squared',
        'micrometers squared',
        'micrometre squared',
        'micrometres squared',
        'nm^2',
        'nm²',
        'nanometer squared',
        'nanometers squared',
        'nanometre squared',
        'nanometres squared',
        'pm^2',
        'pm²',
        'picometer squared',
        'picometers squared',
        'picometre squared',
        'picometres squared',
        'fm^2',
        'fm²',
        'femtometer squared',
        'femtometers squared',
        'femtometre squared',
        'femtometres squared',
        'am^2',
        'am²',
        'attometer squared',
        'attometers squared',
        'attometre squared',
        'attometres squared',
        'zm^2',
        'zm²',
        'zeptometer squared',
        'zeptometers squared',
        'zeptometre squared',
        'zeptometres squared',
        'ym^2',
        'ym²',
        'yoctometer squared',
        'yoctometers squared',
        'yoctometre squared',
        'yoctometres squared',

        'ft^2',
        'ft²',
        'foot squared',
        'feet squared',
        'in^2',
        'in²',
        'inch squared',
        'inches squared',
        'mi^2',
        'mi²',
        'mile squared',
        'miles squared',
        'yd^2',
        'yd²',
        'yard squared',
        'yards squared',
        'ha',
        'hectare',
        'hectares',
        'ac',
        'acre',
        'acres',
    ];

    protected function instantiateTestQuantity()
    {
        return new Area(1, 'm^2');
    }

    public function testToHectares()
    {
        $area = new Area(3, 'ha');

        $this->assertEquals(30000, $area->toUnit("m^2"));
    }

    /**
     * There aren't lots of super nice conversions between ac -> m^2,
     * so we'll check that it's close.
     */
    public function testToAcres()
    {
        $area = new Area(13, 'ac');

        $area = round($area->toUnit("m^2"), 6);

        $this->assertEquals(52609.133491, $area);
    }

    public function testToAre()
    {
        $area = new Area(100, 'm^2');
        $this->assertEquals(1, $area->toUnit('are'));
    }

    public function testToDecare()
    {
        $area = new Area(1000, 'm^2');
        $this->assertEquals(1, $area->toUnit('decare'));
    }

    public function testToDecimeterSquare()
    {
        $area = new Area(1, 'm^2');
        $this->assertEquals(100, $area->toUnit('dm^2'));
        $area = new Area(100, 'm^2');
        $this->assertEquals(10000, $area->toUnit('dm^2'));
    }

    public function testToMillimeterSquare()
    {
        $area = new Area(1, 'm^2');
        $this->assertEquals(1e6, $area->toUnit('mm^2'));
        $area = new Area(100, 'm^2');
        $this->assertEquals(1e8, $area->toUnit('mm^2'));
    }
}
