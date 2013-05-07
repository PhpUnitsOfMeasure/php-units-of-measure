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
        $new_unit = new UnitOfMeasure(
            'm',
            function ($x) {
                return $x;
            },
            function ($x) {
                return $x;
            }
        );
        $new_unit->addAlias('meter');
        $new_unit->addAlias('meters');
        $this->registerUnitOfMeasure($new_unit);

        // Millimeter
        $new_unit = new UnitOfMeasure(
            'mm',
            function ($x) {
                return $x / 0.001;
            },
            function ($x) {
                return $x * 0.001;
            }
        );
        $new_unit->addAlias('millimeter');
        $new_unit->addAlias('millimeters');
        $this->registerUnitOfMeasure($new_unit);

        // Centimeter
        $new_unit = new UnitOfMeasure(
            'cm',
            function ($x) {
                return $x / 0.01;
            },
            function ($x) {
                return $x * 0.01;
            }
        );
        $new_unit->addAlias('centimeter');
        $new_unit->addAlias('centimeters');
        $this->registerUnitOfMeasure($new_unit);

        // Decimeter
        $new_unit = new UnitOfMeasure(
            'dm',
            function ($x) {
                return $x / 0.1;
            },
            function ($x) {
                return $x * 0.1;
            }
        );
        $new_unit->addAlias('decimeter');
        $new_unit->addAlias('decimeters');
        $this->registerUnitOfMeasure($new_unit);

        // Kilometer
        $new_unit = new UnitOfMeasure(
            'km',
            function ($x) {
                return $x / 1000;
            },
            function ($x) {
                return $x * 1000;
            }
        );
        $new_unit->addAlias('kilometer');
        $new_unit->addAlias('kilometers');
        $this->registerUnitOfMeasure($new_unit);

        // Foot
        $new_unit = new UnitOfMeasure(
            'ft',
            function ($x) {
                return $x / 0.3048;
            },
            function ($x) {
                return $x * 0.3048;
            }
        );
        $new_unit->addAlias('foot');
        $new_unit->addAlias('feet');
        $this->registerUnitOfMeasure($new_unit);

        // Inch
        $new_unit = new UnitOfMeasure(
            'in',
            function ($x) {
                return $x / 0.0254;
            },
            function ($x) {
                return $x * 0.0254;
            }
        );
        $new_unit->addAlias('inch');
        $new_unit->addAlias('inches');
        $this->registerUnitOfMeasure($new_unit);

        // Mile
        $new_unit = new UnitOfMeasure(
            'mi',
            function ($x) {
                return $x / 1609.344;
            },
            function ($x) {
                return $x * 1609.344;
            }
        );
        $new_unit->addAlias('mile');
        $new_unit->addAlias('miles');
        $this->registerUnitOfMeasure($new_unit);

        // Yard
        $new_unit = new UnitOfMeasure(
            'yd',
            function ($x) {
                return $x / 0.9144;
            },
            function ($x) {
                return $x * 0.9144;
            }
        );
        $new_unit->addAlias('yard');
        $new_unit->addAlias('yards');
        $this->registerUnitOfMeasure($new_unit);
    }
}
