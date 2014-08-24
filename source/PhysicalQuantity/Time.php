<?php
namespace PhpUnitsOfMeasure\PhysicalQuantity;

use PhpUnitsOfMeasure\PhysicalQuantity;
use PhpUnitsOfMeasure\UnitOfMeasure;
use PhpUnitsOfMeasure\HasSIUnitsTrait;

class Time extends PhysicalQuantity
{
    use HasSIUnitsTrait;

    /**
     * Configure all the standard units of measure
     * to which this quantity can be converted.
     *
     * @return void
     */
    public function __construct($value, $unit)
    {
        parent::__construct($value, $unit);

        // Second
        $second = UnitOfMeasure::nativeUnitFactory('s');
        $second->addAlias('sec');
        $second->addAlias('secs');
        $second->addAlias('second');
        $second->addAlias('seconds');
        $this->registerUnitOfMeasure($second);

        $this->addMissingSIPrefixedUnits(
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
        $this->registerUnitOfMeasure($newUnit);

        // Hours
        $newUnit = UnitOfMeasure::linearUnitFactory('h', 3600);
        $newUnit->addAlias('hr');
        $newUnit->addAlias('hrs');
        $newUnit->addAlias('hour');
        $newUnit->addAlias('hours');
        $this->registerUnitOfMeasure($newUnit);

        // Days
        $newUnit = UnitOfMeasure::linearUnitFactory('d', 86400);
        $newUnit->addAlias('day');
        $newUnit->addAlias('days');
        $this->registerUnitOfMeasure($newUnit);

        // Weeks, understood as 7 days
        $newUnit = UnitOfMeasure::linearUnitFactory('w', 604800);
        $newUnit->addAlias('wk');
        $newUnit->addAlias('wks');
        $newUnit->addAlias('week');
        $newUnit->addAlias('weeks');
        $this->registerUnitOfMeasure($newUnit);
    }
}
