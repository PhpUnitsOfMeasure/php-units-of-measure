<?php
namespace PhpUnitsOfMeasure\PhysicalQuantity;

use PhpUnitsOfMeasure\AbstractPhysicalQuantity;
use PhpUnitsOfMeasure\UnitOfMeasure;

class Acceleration extends AbstractPhysicalQuantity
{
    protected static $unitDefinitions;

    protected static function initialize()
    {
        // meters per second squared
        $meterpersecondsquared = UnitOfMeasure::nativeUnitFactory('m/s^2');
        $meterpersecondsquared->addAlias('m/s²');
        $meterpersecondsquared->addAlias('meter per second squared');
        $meterpersecondsquared->addAlias('meters per second squared');
        $meterpersecondsquared->addAlias('metre per second squared');
        $meterpersecondsquared->addAlias('metres per second squared');
        static::addUnit($meterpersecondsquared);
    }
}
