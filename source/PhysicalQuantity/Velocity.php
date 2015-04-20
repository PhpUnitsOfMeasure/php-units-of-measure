<?php
namespace PhpUnitsOfMeasure\PhysicalQuantity;

use PhpUnitsOfMeasure\AbstractPhysicalQuantity;
use PhpUnitsOfMeasure\UnitOfMeasure;

class Velocity extends AbstractPhysicalQuantity
{
    protected static $unitDefinitions;

    protected static function initialize()
    {
        // meter per second
        $meterpersecond = UnitOfMeasure::nativeUnitFactory('m/s');
        $meterpersecond->addAlias('meters/sec');
        $meterpersecond->addAlias('meters per second');
        $meterpersecond->addAlias('meter per second');
        $meterpersecond->addAlias('metres per second');
        $meterpersecond->addAlias('metre per second');
        static::addUnit($meterpersecond);

        // kilometers per hour
        $newUnit = UnitOfMeasure::linearUnitFactory('km/h', 0.277778);
        $newUnit->addAlias('km/hour');
        $newUnit->addAlias('kilometer per hour');
        $newUnit->addAlias('kilometers per hour');
        $newUnit->addAlias('kilometre per hour');
        $newUnit->addAlias('kilometres per hour');
        static::addUnit($newUnit);

        // feet per second
        $newUnit = UnitOfMeasure::linearUnitFactory('ft/s', 0.3048);
        $newUnit->addAlias('feet/sec');
        $newUnit->addAlias('feet per second');
        static::addUnit($newUnit);

        // miles per hour
        $newUnit = UnitOfMeasure::linearUnitFactory('mph', 0.44704);
        $newUnit->addAlias('miles/hour');
        $newUnit->addAlias('miles per hour');
        static::addUnit($newUnit);

        // knot
        $newUnit = UnitOfMeasure::linearUnitFactory('knot', 0.514444);
        $newUnit->addAlias('knots');
        static::addUnit($newUnit);
    }
}
