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

        // Electronvolt
        $ev = UnitOfMeasure::linearUnitFactory('eV', 1.6021766208e-19);
        $ev->addAlias('electronvolt');
        $ev->addAlias('electronvolts');
        static::addUnit($ev);

        static::addMissingSIPrefixedUnits(
            $ev,
            1,
            '%peV',
            [
                '%Pelectronvolt',
                '%Pelectronvolts',
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

        // Calorie
        $calorie = UnitOfMeasure::linearUnitFactory('cal', 4.184);
        $calorie->addAlias('calorie');
        $calorie->addAlias('calories');
        static::addUnit($calorie);

        static::addMissingSIPrefixedUnits(
            $calorie,
            1,
            '%pcal',
            [
                '%Pcalorie',
                '%Pcalories',
            ]
        );
    }
}
