<?php
namespace PhpUnitsOfMeasure\PhysicalQuantity;

use PhpUnitsOfMeasure\AbstractPhysicalQuantity;
use PhpUnitsOfMeasure\HasSIUnitsTrait;
use PhpUnitsOfMeasure\UnitOfMeasure;

class Velocity extends AbstractPhysicalQuantity
{
    use HasSIUnitsTrait;

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

        static::addMissingSIPrefixedUnits(
            $meterpersecond,
            1,
            '%pm/s',
            [
                '%Pmeters/sec',
                '%Pmeter per second',
                '%Pmeters per second',
                '%Pmetre per second',
                '%Pmetres per second'
            ]
        );

        // meter per minute
        $meterperminute = UnitOfMeasure::linearUnitFactory('m/min', 1 / 60);
        $meterperminute->addAlias('meters/min');
        $meterperminute->addAlias('meters per minute');
        $meterperminute->addAlias('meter per minute');
        $meterperminute->addAlias('metres per minute');
        $meterperminute->addAlias('metre per minute');
        static::addUnit($meterperminute);

        static::addMissingSIPrefixedUnits(
            $meterperminute,
            1,
            '%pm/min',
            [
                '%Pmeters/min',
                '%Pmeter per minute',
                '%Pmeters per minute',
                '%Pmetre per minute',
                '%Pmetres per minute'
            ]
        );
        
        // meters per hour
        $meterperhour = UnitOfMeasure::linearUnitFactory('m/h', 1 / 3600);
        $meterperhour->addAlias('m/hr');
        $meterperhour->addAlias('m/hour');
        $meterperhour->addAlias('meters/hour');
        $meterperhour->addAlias('meter per hour');
        $meterperhour->addAlias('meters per hour');
        $meterperhour->addAlias('metre per hour');
        $meterperhour->addAlias('metres per hour');
        static::addUnit($meterperhour);

        static::addMissingSIPrefixedUnits(
            $meterperhour,
            1,
            '%pm/h',
            [
                '%pm/hr',
                '%pm/hour',
                '%Pmeters/hour',
                '%Pmeter per hour',
                '%Pmeters per hour',
                '%Pmetre per hour',
                '%Pmetres per hour'
            ]
        );

        // feet per second
        $newUnit = UnitOfMeasure::linearUnitFactory('ft/s', 0.3048);
        $newUnit->addAlias('fps');
        $newUnit->addAlias('FPS');
        $newUnit->addAlias('feet/sec');
        $newUnit->addAlias('feet per second');
        static::addUnit($newUnit);

        // feet per minute
        $newUnit = UnitOfMeasure::linearUnitFactory('ft/min', 0.3048 / 60);
        $newUnit->addAlias('fpm');
        $newUnit->addAlias('FPM');
        $newUnit->addAlias('feet/min');
        $newUnit->addAlias('feet per minute');
        static::addUnit($newUnit);

        // miles per second
        $newUnit = UnitOfMeasure::linearUnitFactory('mps', 1609.344);
        $newUnit->addAlias('MPS');
        $newUnit->addAlias('miles/sec');
        $newUnit->addAlias('miles per second');
        static::addUnit($newUnit);

        // miles per hour
        $newUnit = UnitOfMeasure::linearUnitFactory('mph', 1609.344 / 3600);
        $newUnit->addAlias('MPH');
        $newUnit->addAlias('miles/hour');
        $newUnit->addAlias('miles per hour');
        static::addUnit($newUnit);

        // knot
        $newUnit = UnitOfMeasure::linearUnitFactory('kn', 0.514444);
        $newUnit->addAlias('knot');
        $newUnit->addAlias('knots');
        static::addUnit($newUnit);

        // Supersonic speed
        $newUnit = UnitOfMeasure::linearUnitFactory('mach', 344);
        $newUnit->addAlias('speed of sound');
        static::addUnit($newUnit);
    }
}
