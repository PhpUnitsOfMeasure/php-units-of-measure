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
        $new_unit = new UnitOfMeasure(
            's',
            function ($x) {
                return $x;
            },
            function ($x) {
                return $x;
            }
        );
        $new_unit->addAlias('sec');
        $new_unit->addAlias('secs');
        $new_unit->addAlias('second');
        $new_unit->addAlias('seconds');
        $this->registerUnitOfMeasure($new_unit);

        // Minutes
        $new_unit = new UnitOfMeasure(
            'm',
            function ($x) {
                return $x / 60;
            },
            function ($x) {
                return $x * 60;
            }
        );
        $new_unit->addAlias('min');
        $new_unit->addAlias('mins');
        $new_unit->addAlias('minute');
        $new_unit->addAlias('minutes');
        $this->registerUnitOfMeasure($new_unit);

        // Hours
        $new_unit = new UnitOfMeasure(
            'h',
            function ($x) {
                return $x / 3600;
            },
            function ($x) {
                return $x * 3600;
            }
        );
        $new_unit->addAlias('hr');
        $new_unit->addAlias('hrs');
        $new_unit->addAlias('hour');
        $new_unit->addAlias('hours');
        $this->registerUnitOfMeasure($new_unit);

        // Days
        $new_unit = new UnitOfMeasure(
            'd',
            function ($x) {
                return $x / 86400;
            },
            function ($x) {
                return $x * 86400;
            }
        );
        $new_unit->addAlias('day');
        $new_unit->addAlias('days');
        $this->registerUnitOfMeasure($new_unit);

        // Weeks, understood as 7 days
        $new_unit = new UnitOfMeasure(
            'w',
            function ($x) {
                return $x / 604800;
            },
            function ($x) {
                return $x * 604800;
            }
        );
        $new_unit->addAlias('wk');
        $new_unit->addAlias('wks');
        $new_unit->addAlias('week');
        $new_unit->addAlias('weeks');
        $this->registerUnitOfMeasure($new_unit);
    }
}
