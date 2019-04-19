<?php
namespace PhpUnitsOfMeasure\PhysicalQuantity;

use PhpUnitsOfMeasure\AbstractPhysicalQuantity;
use PhpUnitsOfMeasure\HasSIUnitsTrait;
use PhpUnitsOfMeasure\UnitOfMeasure;

class Volume extends AbstractPhysicalQuantity
{
    use HasSIUnitsTrait;

    protected static $unitDefinitions;

    protected static function initialize()
    {
        // Cubic meter
        $cubicmeter = UnitOfMeasure::nativeUnitFactory('m^3');
        $cubicmeter->addAlias('m³');
        $cubicmeter->addAlias('cubic meter');
        $cubicmeter->addAlias('cubic meters');
        $cubicmeter->addAlias('cubic metre');
        $cubicmeter->addAlias('cubic metres');
        static::addUnit($cubicmeter);

        static::addMissingSIPrefixedUnits(
            $cubicmeter,
            1,
            '%pm^3',
            [
                '%pm³',
                'cubic %Pmeter',
                'cubic %Pmeters',
                'cubic %Pmetre',
                'cubic %Pmetres'
            ],
            3 // cubic power factor
        );

        // Cubic foot
        $newUnit = UnitOfMeasure::linearUnitFactory('ft^3', pow(0.3048, 3));
        $newUnit->addAlias('ft³');
        $newUnit->addAlias('cubic foot');
        $newUnit->addAlias('cubic feet');
        static::addUnit($newUnit);

        // Cubic inch
        $newUnit = UnitOfMeasure::linearUnitFactory('in^3', pow(0.0254, 3));
        $newUnit->addAlias('in³');
        $newUnit->addAlias('cubic inch');
        $newUnit->addAlias('cubic inches');
        static::addUnit($newUnit);

        // Cubic yard
        $newUnit = UnitOfMeasure::linearUnitFactory('yd^3', pow(0.9144, 3));
        $newUnit->addAlias('yd³');
        $newUnit->addAlias('cubic yard');
        $newUnit->addAlias('cubic yards');
        static::addUnit($newUnit);

        // Liter
        $liter = UnitOfMeasure::linearUnitFactory('l', 1e-3);
        $liter->addAlias('L');
        $liter->addAlias('liter');
        $liter->addAlias('liters');
        $liter->addAlias('litre');
        $liter->addAlias('litres');
        static::addUnit($liter);

        static::addMissingSIPrefixedUnits(
            $liter,
            1,
            '%pl',
            [
                '%pL',
                '%Pliter',
                '%Pliters',
                '%Plitre',
                '%Plitres'
            ]
        );

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

        // Gallon
        $newUnit = UnitOfMeasure::linearUnitFactory('gal', 3.7854118e-3);
        $newUnit->addAlias('gallon');
        $newUnit->addAlias('gallons');
        $newUnit->addAlias('us gal');
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
    }
}
