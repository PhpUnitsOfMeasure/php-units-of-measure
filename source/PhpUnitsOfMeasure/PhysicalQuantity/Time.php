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
    }
}
