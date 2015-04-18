<?php
namespace PhpUnitsOfMeasure\PhysicalQuantity;

use PhpUnitsOfMeasure\AbstractPhysicalQuantity;
use PhpUnitsOfMeasure\UnitOfMeasure;
use PhpUnitsOfMeasure\HasSIUnitsTrait;

class Energy extends AbstractPhysicalQuantity
{
    use HasSIUnitsTrait;

    protected static $unitDefinitions;

    protected static function initialize()
    {
        // Joule
        $joule = UnitOfMeasure::nativeUnitFactory('J');
        $joule->addAlias('joule');
        $joule->addAlias('joules');
        static::addUnit($joule);

        static::addMissingSIPrefixedUnits(
            $joule,
            1,
            '%pJ',
            [
                '%Pjoule',
                '%Pjoules',
            ]
        );

        // Watt hour
        $wattHour = UnitOfMeasure::linearUnitFactory('Wh', 3600);
        $wattHour->addAlias('watt hour');
        $wattHour->addAlias('watt hours');
        static::addUnit($wattHour);

        static::addMissingSIPrefixedUnits(
            $wattHour,
            1,
            '%pWh',
            [
                '%Pwatt hour',
                '%Pwatt hours',
            ]
        );
    }
}
