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
                return $x / 1e-6;
            },
            function ($x) {
                return $x * 1e-6;
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
                return $x / 1e-4;
            },
            function ($x) {
                return $x * 1e-4;
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
                return $x / 1e-2;
            },
            function ($x) {
                return $x * 1e-2;
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
                return $x / 1e6;
            },
            function ($x) {
                return $x * 1e6;
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
                return $x / 9.290304e-2;
            },
            function ($x) {
                return $x * 9.290304e-2;
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
                return $x / 6.4516e-4;
            },
            function ($x) {
                return $x * 6.4516e-4;
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
                return $x / 2.589988e6;
            },
            function ($x) {
                return $x * 2.589988e6;
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
                return $x / 8.361274e-1;
            },
            function ($x) {
                return $x * 8.361274e-1;
            }
        );
        $new_unit->addAlias('yd²');
        $new_unit->addAlias('yard squared');
        $new_unit->addAlias('yards squared');
        $this->registerUnitOfMeasure($new_unit);

        // Rai - Thai Area Measurement Standard
        $new_unit = new UnitOfMeasure(
            'rai',
            function ($x) {
                return $x / 1600;
            },
            function ($x) {
                return $x * 1600;
            }
        );
        $new_unit->addAlias('rai');
        $this->registerUnitOfMeasure($new_unit);

        // Ngan - Thai Area Measurement Standard
        $new_unit = new UnitOfMeasure(
            'ngan',
            function ($x) {
                return $x / 400;
            },
            function ($x) {
                return $x * 400;
            }
        );
        $new_unit->addAlias('ngan');
        $this->registerUnitOfMeasure($new_unit);

        // Square Wah - Thai Area Measurement Standard
        $new_unit = new UnitOfMeasure(
            'wa^2',
            function ($x) {
                return $x / 4;
            },
            function ($x) {
                return $x * 4;
            }
        );
        $new_unit->addAlias('wa^2');
        $new_unit->addAlias('square wa');
        $new_unit->addAlias('tarang wa');
        $this->registerUnitOfMeasure($new_unit);
    }
}
