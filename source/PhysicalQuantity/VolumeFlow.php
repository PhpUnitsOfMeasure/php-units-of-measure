<?php
namespace PhpUnitsOfMeasure\PhysicalQuantity;

use PhpUnitsOfMeasure\AbstractPhysicalQuantity;
use PhpUnitsOfMeasure\HasSIUnitsTrait;
use PhpUnitsOfMeasure\UnitOfMeasure;

class VolumeFlow extends AbstractPhysicalQuantity
{
    use HasSIUnitsTrait;

    protected static $unitDefinitions;

    protected static function initialize()
    {
        // Cubic meter per second
        $cubicmeterpersecond = UnitOfMeasure::nativeUnitFactory('m^3/s');
        $cubicmeterpersecond->addAlias('m³/s');
        $cubicmeterpersecond->addAlias('cubic meter per second');
        $cubicmeterpersecond->addAlias('cubic meters per second');
        $cubicmeterpersecond->addAlias('cubic metre per second');
        $cubicmeterpersecond->addAlias('cubic metres per second');
        static::addUnit($cubicmeterpersecond);

        static::addMissingSIPrefixedUnits(
            $cubicmeterpersecond,
            1,
            '%pm^3/s',
            [
                '%pm³/s',
                'cubic %Pmeter per second',
                'cubic %Pmeters per second',
                'cubic %Pmetre per second',
                'cubic %Pmetres per second'
            ],
            3 // cubic power factor
        );

        // Cubic meter per minute
        $newUnit = UnitOfMeasure::linearUnitFactory('m^3/min', 1 / 60);
        $newUnit->addAlias('m³/min');
        $newUnit->addAlias('cmm');
        $newUnit->addAlias('CMM');
        $newUnit->addAlias('cubic meter per minute');
        $newUnit->addAlias('cubic meters per minute');
        static::addUnit($newUnit);

        // Cubic meter per hour
        $newUnit = UnitOfMeasure::linearUnitFactory('m^3/h', 1 / 3600);
        $newUnit->addAlias('m³/h');
        $newUnit->addAlias('cmh');
        $newUnit->addAlias('CMH');
        $newUnit->addAlias('cubic meter per hour');
        $newUnit->addAlias('cubic meters per hour');
        static::addUnit($newUnit);

        // Liter per second
        $literpersecond = UnitOfMeasure::linearUnitFactory('l/s', 1e-3);
        $literpersecond->addAlias('L/s');
        $literpersecond->addAlias('liter per second');
        $literpersecond->addAlias('liters per second');
        $literpersecond->addAlias('litre per second');
        $literpersecond->addAlias('litres per second');
        static::addUnit($literpersecond);

        static::addMissingSIPrefixedUnits(
            $literpersecond,
            1,
            '%pl/s',
            [
                '%pL/s',
                '%Pliter per second',
                '%Pliters per second',
                '%Plitre per second',
                '%Plitres per second'
            ]
        );

        // Liter per minute
        $newUnit = UnitOfMeasure::linearUnitFactory('l/min', 1e-3 / 60);
        $newUnit->addAlias('L/min');
        $newUnit->addAlias('lpm');
        $newUnit->addAlias('LPM');
        $newUnit->addAlias('liter per minute');
        $newUnit->addAlias('liters per minute');
        $newUnit->addAlias('litre per minute');
        $newUnit->addAlias('litres per minute');
        static::addUnit($newUnit);

        // Liter per hour
        $newUnit = UnitOfMeasure::linearUnitFactory('l/h', 1e-3 / 3600);
        $newUnit->addAlias('L/h');
        $newUnit->addAlias('lph');
        $newUnit->addAlias('LPH');
        $newUnit->addAlias('liter per hour');
        $newUnit->addAlias('liters per hour');
        $newUnit->addAlias('litre per hour');
        $newUnit->addAlias('litres per hour');
        static::addUnit($newUnit);

        // Cubic foot per second
        $newUnit = UnitOfMeasure::linearUnitFactory('ft^3/s', pow(0.3048, 3));
        $newUnit->addAlias('cfs');
        $newUnit->addAlias('CFS');
        $newUnit->addAlias('ft³/s');
        $newUnit->addAlias('cubic foot per second');
        $newUnit->addAlias('cubic feet per second');
        static::addUnit($newUnit);

        // Cubic foot per minute
        $newUnit = UnitOfMeasure::linearUnitFactory('ft^3/min', pow(0.3048, 3) / 60);
        $newUnit->addAlias('cfm');
        $newUnit->addAlias('CFM');
        $newUnit->addAlias('ft³/min');
        $newUnit->addAlias('cubic foot per minute');
        $newUnit->addAlias('cubic feet per minute');
        static::addUnit($newUnit);

        // Cubic foot per hour
        $newUnit = UnitOfMeasure::linearUnitFactory('ft^3/h', pow(0.3048, 3) / 3600);
        $newUnit->addAlias('cfh');
        $newUnit->addAlias('CFH');
        $newUnit->addAlias('ft³/h');
        $newUnit->addAlias('cubic foot per hour');
        $newUnit->addAlias('cubic feet per hour');
        static::addUnit($newUnit);

        // Gallon per second
        $newUnit = UnitOfMeasure::linearUnitFactory('gal/s', 3.7854118e-3);
        $newUnit->addAlias('gps');
        $newUnit->addAlias('GPS');
        $newUnit->addAlias('gallon per second');
        $newUnit->addAlias('gallons per second');
        $newUnit->addAlias('us gal/s');
        static::addUnit($newUnit);

        // Gallon per minute
        $newUnit = UnitOfMeasure::linearUnitFactory('gal/min', 3.7854118e-3 / 60);
        $newUnit->addAlias('gpm');
        $newUnit->addAlias('GPM');
        $newUnit->addAlias('gallon per minute');
        $newUnit->addAlias('gallons per minute');
        $newUnit->addAlias('us gal/min');
        static::addUnit($newUnit);

        // Gallon per hour
        $newUnit = UnitOfMeasure::linearUnitFactory('gal/h', 3.7854118e-3 / 3600);
        $newUnit->addAlias('gph');
        $newUnit->addAlias('GPH');
        $newUnit->addAlias('gallon per hour');
        $newUnit->addAlias('gallons per hour');
        $newUnit->addAlias('us gal/h');
        static::addUnit($newUnit);

        // Gallon per day
        $newUnit = UnitOfMeasure::linearUnitFactory('gal/d', 3.7854118e-3 / 86400);
        $newUnit->addAlias('gpd');
        $newUnit->addAlias('GPD');
        $newUnit->addAlias('gallon per day');
        $newUnit->addAlias('gallons per day');
        $newUnit->addAlias('us gal/d');
        static::addUnit($newUnit);

        /*
        // Cubic inch per second
        $newUnit = UnitOfMeasure::linearUnitFactory('in^3', pow(0.0254, 3));
        $newUnit->addAlias('in³');
        $newUnit->addAlias('cubic inch per second');
        $newUnit->addAlias('cubic inches per second');
        static::addUnit($newUnit);

        // Cubic yard per second
        $newUnit = UnitOfMeasure::linearUnitFactory('yd^3', pow(0.9144, 3));
        $newUnit->addAlias('yd³');
        $newUnit->addAlias('cubic yard per second');
        $newUnit->addAlias('cubic yards per second');
        static::addUnit($newUnit);

        // Cup
        $newUnit = UnitOfMeasure::linearUnitFactory('cup', 2.365882e-4);
        $newUnit->addAlias('cup');
        $newUnit->addAlias('cups');
        static::addUnit($newUnit);

        // teaspoon
        $newUnit = UnitOfMeasure::linearUnitFactory('tsp', 0.00000492892);
        $newUnit->addAlias('teaspoon');
        $newUnit->addAlias('teaspoons');
        static::addUnit($newUnit);

        // tablespoon
        $newUnit = UnitOfMeasure::linearUnitFactory('tbsp', 0.00001478676);
        $newUnit->addAlias('tablespoon');
        $newUnit->addAlias('tablespoons');
        static::addUnit($newUnit);

        // Quart
        $newUnit = UnitOfMeasure::linearUnitFactory('qt', 9.4635295e-4);
        $newUnit->addAlias('quart');
        $newUnit->addAlias('quarts');
        $newUnit->addAlias('qts');
        $newUnit->addAlias('liq qt');
        static::addUnit($newUnit);

        // Fluid Ounce
        $newUnit = UnitOfMeasure::linearUnitFactory('fl oz', 2.957353e-5);
        $newUnit->addAlias('fluid ounce');
        $newUnit->addAlias('fluid ounces');
        $newUnit->addAlias('fluid oz');
        $newUnit->addAlias('fl. oz.');
        $newUnit->addAlias('oz. fl.');
        static::addUnit($newUnit);

        // Pint
        $newUnit = UnitOfMeasure::linearUnitFactory('pt', 4.73176475e-4);
        $newUnit->addAlias('pint');
        $newUnit->addAlias('pints');
        $newUnit->addAlias('liq pt');
        static::addUnit($newUnit);
        */
    }
}
