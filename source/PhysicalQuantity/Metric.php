<?php

namespace PhpUnitsOfMeasure\PhysicalQuantity;

class Metric extends AbstractPhysicalQuantity
{
    protected static $unitDefinitions;

    protected static function initialize()
    {
        // liter per hour
        $unit = UnitOfMeasure::linearUnitFactory('l/h', 1.0002);
        $unit->addAlias('liter/hour');
        $unit->addAlias('litre/hour');
        $unit->addAlias('liter per hour');
        $unit->addAlias('liters per hour');
        $unit->addAlias('litre per hour');
        $unit->addAlias('litres per hour');
        static::addUnit($unit);
    }
}
