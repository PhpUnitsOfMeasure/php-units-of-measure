<?php
namespace PhpUnitsOfMeasure\PhysicalQuantity;

use \PhpUnitsOfMeasure\PhysicalQuantity;
use \PhpUnitsOfMeasure\UnitOfMeasure;

class Length extends PhysicalQuantity
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

        // Meter
        $newUnit = new UnitOfMeasure(
            'm',
            function ($x) {
                return $x;
            },
            function ($x) {
                return $x;
            }
        );
        $newUnit->addAlias('meter');
        $newUnit->addAlias('meters');
        $this->registerUnitOfMeasure($newUnit);

        // Millimeter
        $newUnit = new UnitOfMeasure(
            'mm',
            function ($x) {
                return $x / 0.001;
            },
            function ($x) {
                return $x * 0.001;
            }
        );
        $newUnit->addAlias('millimeter');
        $newUnit->addAlias('millimeters');
        $this->registerUnitOfMeasure($newUnit);

        // Centimeter
        $newUnit = new UnitOfMeasure(
            'cm',
            function ($x) {
                return $x / 0.01;
            },
            function ($x) {
                return $x * 0.01;
            }
        );
        $newUnit->addAlias('centimeter');
        $newUnit->addAlias('centimeters');
        $this->registerUnitOfMeasure($newUnit);

        // Decimeter
        $newUnit = new UnitOfMeasure(
            'dm',
            function ($x) {
                return $x / 0.1;
            },
            function ($x) {
                return $x * 0.1;
            }
        );
        $newUnit->addAlias('decimeter');
        $newUnit->addAlias('decimeters');
        $this->registerUnitOfMeasure($newUnit);

        // Kilometer
        $newUnit = new UnitOfMeasure(
            'km',
            function ($x) {
                return $x / 1000;
            },
            function ($x) {
                return $x * 1000;
            }
        );
        $newUnit->addAlias('kilometer');
        $newUnit->addAlias('kilometers');
        $this->registerUnitOfMeasure($newUnit);

        // Foot
        $newUnit = new UnitOfMeasure(
            'ft',
            function ($x) {
                return $x / 0.3048;
            },
            function ($x) {
                return $x * 0.3048;
            }
        );
        $newUnit->addAlias('foot');
        $newUnit->addAlias('feet');
        $this->registerUnitOfMeasure($newUnit);

        // Inch
        $newUnit = new UnitOfMeasure(
            'in',
            function ($x) {
                return $x / 0.0254;
            },
            function ($x) {
                return $x * 0.0254;
            }
        );
        $newUnit->addAlias('inch');
        $newUnit->addAlias('inches');
        $this->registerUnitOfMeasure($newUnit);

        // Mile
        $newUnit = new UnitOfMeasure(
            'mi',
            function ($x) {
                return $x / 1609.344;
            },
            function ($x) {
                return $x * 1609.344;
            }
        );
        $newUnit->addAlias('mile');
        $newUnit->addAlias('miles');
        $this->registerUnitOfMeasure($newUnit);

        // Yard
        $newUnit = new UnitOfMeasure(
            'yd',
            function ($x) {
                return $x / 0.9144;
            },
            function ($x) {
                return $x * 0.9144;
            }
        );
        $newUnit->addAlias('yard');
        $newUnit->addAlias('yards');
        $this->registerUnitOfMeasure($newUnit);
    }
}
