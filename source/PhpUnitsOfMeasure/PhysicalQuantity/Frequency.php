<?php
namespace PhpUnitsOfMeasure\PhysicalQuantity;

use PhpUnitsOfMeasure\PhysicalQuantity;
use PhpUnitsOfMeasure\UnitOfMeasure;

class Frequency extends PhysicalQuantity
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

        // Ampere
        $newUnit = new UnitOfMeasure(
            'Hz',
            function ($x) {
                return $x;
            },
            function ($x) {
                return $x;
            },
            array(
                'hertz'
            )
        );
        $this->registerUnitOfMeasure($newUnit);

        // Kilohertz
        $newUnit = new UnitOfMeasure(
            'kHz',
            function ($x) {
                return $x / 1000;
            },
            function ($x) {
                return $x * 1000;
            },
            array(
                'kilohertz',
            )
        );
        $this->registerUnitOfMeasure($newUnit);

        // Megahertz
        $newUnit = new UnitOfMeasure(
            'MHz',
            function ($x) {
                return $x / pow(10,6);
            },
            function ($x) {
                return $x * pow(10,6);
            },
            array(
                'megahertz',
            )
        );

        // Gigahertz
        $newUnit = new UnitOfMeasure(
            'GHz',
            function ($x) {
                return $x / pow(10,9);
            },
            function ($x) {
                return $x * pow(10,9);
            },
            array(
                'gigahertz',
            )
        );
    }
}