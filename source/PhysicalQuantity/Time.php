<?php
namespace PhpUnitsOfMeasure\PhysicalQuantity;

use PhpUnitsOfMeasure\PhysicalQuantity;
use PhpUnitsOfMeasure\UnitOfMeasure;

class Time extends PhysicalQuantity
{
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
        $newUnit = UnitOfMeasure::NativeUnitFactory('s');
        $newUnit->addAlias('sec');
        $newUnit->addAlias('secs');
        $newUnit->addAlias('second');
        $newUnit->addAlias('seconds');
        $this->registerUnitOfMeasure($newUnit);

        // Minutes
        $newUnit = UnitOfMeasure::LinearUnitFactory('m', 60);
        $newUnit->addAlias('min');
        $newUnit->addAlias('mins');
        $newUnit->addAlias('minute');
        $newUnit->addAlias('minutes');
        $this->registerUnitOfMeasure($newUnit);

        // Hours
        $newUnit = UnitOfMeasure::LinearUnitFactory('h', 3600);
        $newUnit->addAlias('hr');
        $newUnit->addAlias('hrs');
        $newUnit->addAlias('hour');
        $newUnit->addAlias('hours');
        $this->registerUnitOfMeasure($newUnit);

        // Days
        $newUnit = UnitOfMeasure::LinearUnitFactory('d', 86400);
        $newUnit->addAlias('day');
        $newUnit->addAlias('days');
        $this->registerUnitOfMeasure($newUnit);

        // Weeks, understood as 7 days
        $newUnit = UnitOfMeasure::LinearUnitFactory('w', 604800);
        $newUnit->addAlias('wk');
        $newUnit->addAlias('wks');
        $newUnit->addAlias('week');
        $newUnit->addAlias('weeks');
        $this->registerUnitOfMeasure($newUnit);
    }
}
