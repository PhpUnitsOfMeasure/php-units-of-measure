<?php
namespace PhpUnitsOfMeasure\PhysicalQuantity;

use PhpUnitsOfMeasure\AbstractPhysicalQuantity;
use PhpUnitsOfMeasure\UnitOfMeasure;
use PhpUnitsOfMeasure\HasSIUnitsTrait;

class Pressure extends AbstractPhysicalQuantity
{
    use HasSIUnitsTrait;

    protected static $unitDefinitions;

    protected static function initialize()
    {
        // Pascal
        $pascal = UnitOfMeasure::nativeUnitFactory('Pa');
        $pascal->addAlias('pascal');
        $pascal->addAlias('pascals');
        static::addUnit($pascal);

        static::addMissingSIPrefixedUnits(
            $pascal,
            1,
            '%pPa',
            [
                '%Ppascal',
                '%Ppascals',
            ]
        );

        // Standard atmosphere
        $newUnit = UnitOfMeasure::linearUnitFactory('atm', 101325);
        $newUnit->addAlias('atmosphere');
        $newUnit->addAlias('atmospheres');
        static::addUnit($newUnit);

        // Technical atmosphere
        $newUnit = UnitOfMeasure::linearUnitFactory('at', 98066.5);
        $newUnit->addAlias('technical atmosphere');
        $newUnit->addAlias('technical atmospheres');
        static::addUnit($newUnit);

        // Torr
        $newUnit = UnitOfMeasure::linearUnitFactory('torr', 101325 / 760);
        static::addUnit($newUnit);

        // Bar
        $bar = UnitOfMeasure::linearUnitFactory('bar', 1e5);
        static::addUnit($bar);

        static::addMissingSIPrefixedUnits(
            $bar,
            1,
            '%pbar'
        );

        // Inch of Mercury
        $newUnit = UnitOfMeasure::linearUnitFactory('inHg', 1 / 0.00029530);
        $newUnit->addAlias('inches of mercury');
        static::addUnit($newUnit);

        // Millimeter of Mercury
        $newUnit = UnitOfMeasure::linearUnitFactory('mmHg', 133.322387415);
        $newUnit->addAlias('millimeters of mercury');
        $newUnit->addAlias('millimetres of mercury');
        static::addUnit($newUnit);

        // Pound per Square Inch
        $newUnit = UnitOfMeasure::linearUnitFactory('psi', 6894.757293168);
        $newUnit->addAlias('pounds per square inch');
        static::addUnit($newUnit);

        // Kilo-pound per Square Inch
        $newUnit = UnitOfMeasure::linearUnitFactory('ksi', 6894757.293168);
        $newUnit->addAlias('kilopounds per square inch');
        static::addUnit($newUnit);

        // Kilo-pound per Square Inch
        $newUnit = UnitOfMeasure::linearUnitFactory('Mpsi', 6894757293.168);
        $newUnit->addAlias('megapounds per square inch');
        static::addUnit($newUnit);
    }
}
