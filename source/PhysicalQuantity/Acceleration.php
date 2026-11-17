<?php
namespace PhpUnitsOfMeasure\PhysicalQuantity;

use PhpUnitsOfMeasure\AbstractPhysicalQuantity;
use PhpUnitsOfMeasure\HasSIUnitsTrait;
use PhpUnitsOfMeasure\UnitOfMeasure;

class Acceleration extends AbstractPhysicalQuantity
{
    use HasSIUnitsTrait;

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

        static::addMissingSIPrefixedUnits(
            $meterpersecondsquared,
            1,
            '%pm/s^2',
            [
                '%pm/s²',
                '%Pmeter per second squared',
                '%Pmeters per second squared',
                '%Pmetre per second squared',
                '%Pmetres per second squared',
            ]
        );
    }
}
