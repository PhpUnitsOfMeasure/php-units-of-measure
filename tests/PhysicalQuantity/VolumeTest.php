<?php

namespace PhpUnitsOfMeasureTest\PhysicalQuantity;

use PhpUnitsOfMeasure\PhysicalQuantity\Volume;

class VolumeTest extends AbstractPhysicalQuantityTestCase
{
    protected $supportedUnitsWithAliases = [
        'm^3',
        'm³',
        'cubic meter',
        'cubic meters',
        'cubic metre',
        'cubic metres',
        'mm^3',
        'mm³',
        'cubic millimeter',
        'cubic millimeters',
        'cubic millimetre',
        'cubic millimetres',
        'cm^3',
        'cm³',
        'cubic centimeter',
        'cubic centimeters',
        'cubic centimetre',
        'cubic centimetres',
        'dm^3',
        'dm³',
        'cubic decimeter',
        'cubic decimeters',
        'cubic decimetre',
        'cubic decimetres',
        'km^3',
        'km³',
        'cubic kilometer',
        'cubic kilometers',
        'cubic kilometre',
        'cubic kilometres',
        'ft^3',
        'ft³',
        'cubic foot',
        'cubic feet',
        'in^3',
        'in³',
        'cubic inch',
        'cubic inches',
        'yd^3',
        'yd³',
        'cubic yard',
        'cubic yards',
        'ml',
        'milliliter',
        'milliliters',
        'millilitre',
        'millilitres',
        'cl',
        'centiliter',
        'centiliters',
        'centilitre',
        'centilitres',
        'dl',
        'deciliter',
        'deciliters',
        'decilitre',
        'decilitres',
        'l',
        'liter',
        'liters',
        'litre',
        'litres',
        'dal',
        'decaliter',
        'decaliters',
        'decalitre',
        'decalitres',
        'hl',
        'hectoliter',
        'hectoliters',
        'hectolitre',
        'hectolitres',
        'cup',
        'cup',
        'cups',
    ];

    protected function instantiateTestQuantity()
    {
        return new Volume(1, 'm^3');
    }

    public function testToCubicDecimeter()
    {
        $area = new Volume(1, 'm^3');
        $this->assertEquals(1000, $area->toUnit('dm^3'));
        $area = new Volume(100, 'm^3');
        $this->assertEquals(100000, $area->toUnit('dm^3'));
    }

    public function testToCubicMillimeter()
    {
        $area = new Volume(1, 'm^3');
        $this->assertEquals(1e9, $area->toUnit('mm^3'), '', 0.000001);
        $area = new Volume(100, 'm^3');
        $this->assertEquals(1e11, $area->toUnit('mm^3'));
    }

    public function testToLitres()
    {
        $area = new Volume(1, 'm^3');
        $this->assertEquals(1000, $area->toUnit('l'));
        $area = new Volume(100, 'm^3');
        $this->assertEquals(100000, $area->toUnit('l'));
    }

    public function testToMilliLitres()
    {
        $area = new Volume(1, 'l');
        $this->assertEquals(1000, $area->toUnit('ml'));
        $area = new Volume(100, 'l');
        $this->assertEquals(100000, $area->toUnit('ml'));
    }

    public function testToHectoLitres()
    {
        $area = new Volume(1, 'l');
        $this->assertEquals(0.01, $area->toUnit('hl'));
        $area = new Volume(100, 'l');
        $this->assertEquals(1, $area->toUnit('hl'));
    }

    public function testToKiloLitres()
    {
        $area = new Volume(1, 'l');
        $this->assertEquals(0.001, $area->toUnit('kl'));
        $area = new Volume(100, 'l');
        $this->assertEquals(0.1, $area->toUnit('kl'));
    }

    public function testToGallon()
    {
        $area = new Volume(1, 'm^3');
        $this->assertEquals(264.172051, $area->toUnit('gal'), '', 0.000001);
        $area = new Volume(100, 'm^3');
        $this->assertEquals(26417.205124, $area->toUnit('gal'), '', 0.000001);
    }
}
