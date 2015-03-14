<?php
namespace PhpUnitsOfMeasure\PhysicalQuantity;

use PhpUnitsOfMeasure\AbstractPhysicalQuantity;
use PhpUnitsOfMeasure\UnitOfMeasure;
use PhpUnitsOfMeasure\HasSIUnitsTrait;

class Length extends AbstractPhysicalQuantity
{
    use HasSIUnitsTrait;

    protected static $unitDefinitions;

    protected static function initialize()
    {
        // Meter
        $meter = UnitOfMeasure::nativeUnitFactory('m');
        $meter->addAlias('meter');
        $meter->addAlias('meters');
        $meter->addAlias('metre');
        $meter->addAlias('metres');
        static::addUnit($meter);

        static::addMissingSIPrefixedUnits(
            $meter,
            1,
            '%pm',
            [
                '%Pmeter',
                '%Pmeters',
                '%Pmetre',
                '%Pmetres'
            ]
        );

        // Foot
        $newUnit = UnitOfMeasure::linearUnitFactory('ft', 0.3048);
        $newUnit->addAlias('foot');
        $newUnit->addAlias('feet');
        static::addUnit($newUnit);

        // Inch
        $newUnit = UnitOfMeasure::linearUnitFactory('in', 0.0254);
        $newUnit->addAlias('inch');
        $newUnit->addAlias('inches');
        static::addUnit($newUnit);

        // Mile
        $newUnit = UnitOfMeasure::linearUnitFactory('mi', 1609.344);
        $newUnit->addAlias('mile');
        $newUnit->addAlias('miles');
        static::addUnit($newUnit);

        // Yard
        $newUnit = UnitOfMeasure::linearUnitFactory('yd', 0.9144);
        $newUnit->addAlias('yard');
        $newUnit->addAlias('yards');
        static::addUnit($newUnit);
    }
}
