<?php
namespace PhpUnitsOfMeasure\PhysicalQuantity;

use PhpUnitsOfMeasure\AbstractPhysicalQuantity;
use PhpUnitsOfMeasure\UnitOfMeasure;

class Area extends AbstractPhysicalQuantity
{
    protected static $unitDefinitions;

    protected static function initialize()
    {
        // Meters squared
        $metersquared = UnitOfMeasure::nativeUnitFactory('m^2');
        $metersquared->addAlias('m²');
        $metersquared->addAlias('meter squared');
        $metersquared->addAlias('meters squared');
        $metersquared->addAlias('metre squared');
        $metersquared->addAlias('metres squared');
        static::addUnit($metersquared);

        // Millimeter squared
        $newUnit = UnitOfMeasure::linearUnitFactory('mm^2', 1e-6);
        $newUnit->addAlias('mm²');
        $newUnit->addAlias('millimeter squared');
        $newUnit->addAlias('millimeters squared');
        $newUnit->addAlias('millimetre squared');
        $newUnit->addAlias('millimetres squared');
        static::addUnit($newUnit);

        // Centimeter squared
        $newUnit = UnitOfMeasure::linearUnitFactory('cm^2', 1e-4);
        $newUnit->addAlias('cm²');
        $newUnit->addAlias('centimeter squared');
        $newUnit->addAlias('centimeters squared');
        $newUnit->addAlias('centimetre squared');
        $newUnit->addAlias('centimetres squared');
        static::addUnit($newUnit);

        // Decimeter squared
        $newUnit = UnitOfMeasure::linearUnitFactory('dm^2', 1e-2);
        $newUnit->addAlias('dm²');
        $newUnit->addAlias('decimeter squared');
        $newUnit->addAlias('decimeters squared');
        $newUnit->addAlias('decimetre squared');
        $newUnit->addAlias('decimetres squared');
        static::addUnit($newUnit);

        // Kilometer squared
        $newUnit = UnitOfMeasure::linearUnitFactory('km^2', 1e6);
        $newUnit->addAlias('km²');
        $newUnit->addAlias('kilometer squared');
        $newUnit->addAlias('kilometers squared');
        $newUnit->addAlias('kilometre squared');
        $newUnit->addAlias('kilometres squared');
        static::addUnit($newUnit);

        // Foot squared
        $newUnit = UnitOfMeasure::linearUnitFactory('ft^2', 9.290304e-2);
        $newUnit->addAlias('ft²');
        $newUnit->addAlias('foot squared');
        $newUnit->addAlias('feet squared');
        static::addUnit($newUnit);

        // Inch squared
        $newUnit = UnitOfMeasure::linearUnitFactory('in^2', 6.4516e-4);
        $newUnit->addAlias('in²');
        $newUnit->addAlias('inch squared');
        $newUnit->addAlias('inches squared');
        static::addUnit($newUnit);

        // Mile squared
        $newUnit = UnitOfMeasure::linearUnitFactory('mi^2', 2.589988e6);
        $newUnit->addAlias('mi²');
        $newUnit->addAlias('mile squared');
        $newUnit->addAlias('miles squared');
        static::addUnit($newUnit);

        // Yard squared
        $newUnit = UnitOfMeasure::linearUnitFactory('yd^2', 8.361274e-1);
        $newUnit->addAlias('yd²');
        $newUnit->addAlias('yard squared');
        $newUnit->addAlias('yards squared');
        static::addUnit($newUnit);

        // Hectare
        $newUnit = UnitOfMeasure::linearUnitFactory('ha', 10000);
        $newUnit->addAlias('hectare');
        $newUnit->addAlias('hectares');
        static::addUnit($newUnit);


        // International Acre
        $newUnit = UnitOfMeasure::linearUnitFactory('ac', 4046.8564224);
        $newUnit->addAlias('acre');
        $newUnit->addAlias('acres');
        static::addUnit($newUnit);
    }
}
