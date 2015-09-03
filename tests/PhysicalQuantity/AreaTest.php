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
        'mm^2',
        'mm²',
        'millimeter squared',
        'millimeters squared',
        'millimetre squared',
        'millimetres squared',
        'cm^2',
        'cm²',
        'centimeter squared',
        'centimeters squared',
        'centimetre squared',
        'centimetres squared',
        'dm^2',
        'dm²',
        'decimeter squared',
        'decimeters squared',
        'decimetre squared',
        'decimetres squared',
        'km^2',
        'km²',
        'kilometer squared',
        'kilometers squared',
        'kilometre squared',
        'kilometres squared',
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

        $this->assertEquals(30000, $area->toUnit("m^2")->getValue());
    }

    /**
     * There aren't lots of super nice conversions between ac -> m^2,
     * so we'll check that it's close.
     */
    public function testToAcres()
    {
        $area = new Area(13, 'ac');

        $area = round($area->toUnit("m^2")->getValue(), 6);

        $this->assertEquals(52609.133491, $area);
    }

    public function testToAre()
    {
        $area = new Area(100, 'm^2');
        $this->assertEquals(1, $area->toUnit('are')->getValue());
    }

    public function testToDecare()
    {
        $area = new Area(1000, 'm^2');
        $this->assertEquals(1, $area->toUnit('decare')->getValue());
    }
}
