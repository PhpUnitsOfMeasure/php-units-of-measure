<?php
namespace PhpUnitsOfMeasure\PhysicalQuantity;

use PhpUnitsOfMeasure\AbstractPhysicalQuantity;
use PhpUnitsOfMeasure\UnitOfMeasure;
use PhpUnitsOfMeasure\HasSIUnitsTrait;

class Power extends AbstractPhysicalQuantity
{
    use HasSIUnitsTrait;

    protected static $unitDefinitions;

    protected static function initialize()
    {
        // Watt
        $watt = UnitOfMeasure::nativeUnitFactory('W');
        $watt->addAlias('watt');
        $watt->addAlias('watts');
        static::addUnit($watt);

        static::addMissingSIPrefixedUnits(
            $watt,
            1,
            '%pW',
            [
                '%Pwatt',
                '%Pwatts',
            ]
        );

        // decibels-milliwatt
        $newUnit = new UnitOfMeasure(
            'dBm',
            function ($x) {
                return 10 * log10($x) + 30;
            },
            function ($x) {
                return pow(10, ($x / 10)) / 1000;
            }
        );
        $newUnit->addAlias('dbm');
        $newUnit->addAlias('decibels-milliwatt');
        static::addUnit($newUnit);
    }
}
