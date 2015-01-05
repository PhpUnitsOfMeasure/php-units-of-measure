<?php
namespace PhpUnitsOfMeasure\PhysicalQuantity;

use PhpUnitsOfMeasure\AbstractPhysicalQuantity;
use PhpUnitsOfMeasure\UnitOfMeasure;
use PhpUnitsOfMeasure\HasSIUnitsTrait;

class Time extends AbstractPhysicalQuantity
{
    use HasSIUnitsTrait;

    protected static $unitDefinitions;

    protected static function initialize()
    {
        // Second
        $second = UnitOfMeasure::nativeUnitFactory('s');
        $second->addAlias('sec');
        $second->addAlias('secs');
        $second->addAlias('second');
        $second->addAlias('seconds');
        static::addUnit($second);

        static::addMissingSIPrefixedUnits(
            $second,
            1,
            '%ps',
            [
                '%Psec',
                '%Psecs',
                '%Psecond',
                '%Pseconds'
            ]
        );

        // Minutes
        $newUnit = UnitOfMeasure::linearUnitFactory('m', 60);
        $newUnit->addAlias('min');
        $newUnit->addAlias('mins');
        $newUnit->addAlias('minute');
        $newUnit->addAlias('minutes');
        static::addUnit($newUnit);

        // Hours
        $newUnit = UnitOfMeasure::linearUnitFactory('h', 3600);
        $newUnit->addAlias('hr');
        $newUnit->addAlias('hrs');
        $newUnit->addAlias('hour');
        $newUnit->addAlias('hours');
        static::addUnit($newUnit);

        // Days
        $newUnit = UnitOfMeasure::linearUnitFactory('d', 86400);
        $newUnit->addAlias('day');
        $newUnit->addAlias('days');
        static::addUnit($newUnit);

        // Weeks, understood as 7 days
        $newUnit = UnitOfMeasure::linearUnitFactory('w', 604800);
        $newUnit->addAlias('wk');
        $newUnit->addAlias('wks');
        $newUnit->addAlias('week');
        $newUnit->addAlias('weeks');
        static::addUnit($newUnit);
    }
}
