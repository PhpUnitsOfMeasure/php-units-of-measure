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
        'cups',
        'gallon',
        'gallons',
        'us gal',
        'quart',
        'quarts',
        'qt',
        'qts',
        'liq qt',
        'fluid ounce',
        'fluid ounces',
        'fluid-ounce',
        'fl oz',
        'pint',
        'pints',
        'pt',
        'liq pt',
    ];

    protected function instantiateTestQuantity()
    {
        return new Volume(1, 'm^3');
    }

    public function test4QuartsInGallon()
    {
        $volume = new Volume(4, 'quarts');
        $this->assertEquals(1, $volume->toUnit('gallon'));
    }

    public function test8PintsInGallon()
    {
        $volume = new Volume(8, 'pints');
        $this->assertEquals(1, $volume->toUnit('gallon'));
    }
}
