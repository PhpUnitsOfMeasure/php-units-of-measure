<?php
namespace PhpUnitsOfMeasure\PhysicalQuantity;

use \PhpUnitsOfMeasure\PhysicalQuantity;
use \PhpUnitsOfMeasure\UnitOfMeasure;

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
        $newUnit = new UnitOfMeasure(
            's',
            function ($x) {
                return $x;
            },
            function ($x) {
                return $x;
            }
        );
        $newUnit->addAlias('sec');
        $newUnit->addAlias('secs');
        $newUnit->addAlias('second');
        $newUnit->addAlias('seconds');
        $this->registerUnitOfMeasure($newUnit);

        // Minutes
        $newUnit = new UnitOfMeasure(
            'm',
            function ($x) {
                return $x / 60;
            },
            function ($x) {
                return $x * 60;
            }
        );
        $newUnit->addAlias('min');
        $newUnit->addAlias('mins');
        $newUnit->addAlias('minute');
        $newUnit->addAlias('minutes');
        $this->registerUnitOfMeasure($newUnit);

        // Hours
        $newUnit = new UnitOfMeasure(
            'h',
            function ($x) {
                return $x / 3600;
            },
            function ($x) {
                return $x * 3600;
            }
        );
        $newUnit->addAlias('hr');
        $newUnit->addAlias('hrs');
        $newUnit->addAlias('hour');
        $newUnit->addAlias('hours');
        $this->registerUnitOfMeasure($newUnit);

        // Days
        $newUnit = new UnitOfMeasure(
            'd',
            function ($x) {
                return $x / 86400;
            },
            function ($x) {
                return $x * 86400;
            }
        );
        $newUnit->addAlias('day');
        $newUnit->addAlias('days');
        $this->registerUnitOfMeasure($newUnit);

        // Weeks, understood as 7 days
        $newUnit = new UnitOfMeasure(
            'w',
            function ($x) {
                return $x / 604800;
            },
            function ($x) {
                return $x * 604800;
            }
        );
        $newUnit->addAlias('wk');
        $newUnit->addAlias('wks');
        $newUnit->addAlias('week');
        $newUnit->addAlias('weeks');
        $this->registerUnitOfMeasure($newUnit);
    }
}
