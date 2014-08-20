<?php
namespace PhpUnitsOfMeasure\PhysicalQuantity;

use \PhpUnitsOfMeasure\PhysicalQuantity;
use \PhpUnitsOfMeasure\UnitOfMeasure;

class Voltage extends PhysicalQuantity
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

        // Volt
        $newUnit = new UnitOfMeasure(
            'V',
            function ($x) {
                return $x;
            },
            function ($x) {
                return $x;
            },
            array(
                'volt',
                'volts'
            )
        );
        $this->registerUnitOfMeasure($newUnit);

        // Millivolt
        $newUnit = new UnitOfMeasure(
            'mV',
            function ($x) {
                return $x / 0.001;
            },
            function ($x) {
                return $x * 0.001;
            },
            array(
                'millivolt',
                'millivolts',
                'milli-volt',
                'milli-volts'
            )
        );
        $this->registerUnitOfMeasure($newUnit);
    }
}
