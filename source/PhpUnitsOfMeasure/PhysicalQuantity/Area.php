<?php
namespace PhpUnitsOfMeasure\PhysicalQuantity;

use \PhpUnitsOfMeasure\PhysicalQuantity;
use \PhpUnitsOfMeasure\UnitOfMeasure;

class Area extends PhysicalQuantity
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

        // Meters squared
        $new_unit = new UnitOfMeasure(
            'm^2',
            function ($x) {
                return $x;
            },
            function ($x) {
                return $x;
            }
        );
        $new_unit->addAlias('m²');
        $new_unit->addAlias('meter squared');
        $new_unit->addAlias('meters squared');
        $this->registerUnitOfMeasure($new_unit);

        // Millimeter squared
        $new_unit = new UnitOfMeasure(
            'mm^2',
            function ($x) {
                return $x / pow(10, -6);
            },
            function ($x) {
                return $x * pow(10, -6);
            }
        );
        $new_unit->addAlias('mm²');
        $new_unit->addAlias('millimeter squared');
        $new_unit->addAlias('millimeters squared');
        $this->registerUnitOfMeasure($new_unit);

        // Centimeter squared
        $new_unit = new UnitOfMeasure(
            'cm^2',
            function ($x) {
                return $x / pow(10, -4);
            },
            function ($x) {
                return $x * pow(10, -4);
            }
        );
        $new_unit->addAlias('cm²');
        $new_unit->addAlias('centimeter squared');
        $new_unit->addAlias('centimeters squared');
        $this->registerUnitOfMeasure($new_unit);

        // Decimeter squared
        $new_unit = new UnitOfMeasure(
            'dm^2',
            function ($x) {
                return $x / 0.01;
            },
            function ($x) {
                return $x * 0.01;
            }
        );
        $new_unit->addAlias('dm²');
        $new_unit->addAlias('decimeter squared');
        $new_unit->addAlias('decimeters squared');
        $this->registerUnitOfMeasure($new_unit);

        // Kilometer squared
        $new_unit = new UnitOfMeasure(
            'km^2',
            function ($x) {
                return $x / 1000000;
            },
            function ($x) {
                return $x * 1000000;
            }
        );
        $new_unit->addAlias('km²');
        $new_unit->addAlias('kilometer squared');
        $new_unit->addAlias('kilometers squared');
        $this->registerUnitOfMeasure($new_unit);

        // Foot squared
        $new_unit = new UnitOfMeasure(
            'ft^2',
            function ($x) {
                return $x / 0.0929;
            },
            function ($x) {
                return $x * 0.0929;
            }
        );
        $new_unit->addAlias('ft²');
        $new_unit->addAlias('foot squared');
        $new_unit->addAlias('feet squared');
        $this->registerUnitOfMeasure($new_unit);

        // Inch squared
        $new_unit = new UnitOfMeasure(
            'in^2',
            function ($x) {
                return $x / 6.45 * pow(10, -4);
            },
            function ($x) {
                return $x * 6.45 * pow(10, -4);
            }
        );
        $new_unit->addAlias('in²');
        $new_unit->addAlias('inch squared');
        $new_unit->addAlias('inches squared');
        $this->registerUnitOfMeasure($new_unit);

        // Mile squared
        $new_unit = new UnitOfMeasure(
            'mi^2',
            function ($x) {
                return $x / 2589987.83;
            },
            function ($x) {
                return $x * 2589987.83;
            }
        );
        $new_unit->addAlias('mi²');
        $new_unit->addAlias('mile squared');
        $new_unit->addAlias('miles squared');
        $this->registerUnitOfMeasure($new_unit);

        // Yard squared
        $new_unit = new UnitOfMeasure(
            'yd^2',
            function ($x) {
                return $x / 0.8361;
            },
            function ($x) {
                return $x * 0.8361;
            }
        );
        $new_unit->addAlias('yd²');
        $new_unit->addAlias('yard squared');
        $new_unit->addAlias('yards squared');
        $this->registerUnitOfMeasure($new_unit);
    }
}
