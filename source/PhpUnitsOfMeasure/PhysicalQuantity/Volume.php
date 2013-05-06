<?php
namespace PhpUnitsOfMeasure\PhysicalQuantity;

use \PhpUnitsOfMeasure\PhysicalQuantity;
use \PhpUnitsOfMeasure\UnitOfMeasure;

class Volume extends PhysicalQuantity
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

        // Cubic meter
        $new_unit = new UnitOfMeasure(
            'm^3',
            function ($x) {
                return $x;
            },
            function ($x) {
                return $x;
            }
        );
        $new_unit->addAlias('m³');
        $new_unit->addAlias('cubic meter');
        $new_unit->addAlias('cubic meters');
        $this->registerUnitOfMeasure($new_unit);

        // Cubic millimeter
        $new_unit = new UnitOfMeasure(
            'mm^3',
            function ($x) {
                return $x / pow(10, -9);
            },
            function ($x) {
                return $x * pow(10, -9);
            }
        );
        $new_unit->addAlias('mm³');
        $new_unit->addAlias('cubic millimeter');
        $new_unit->addAlias('cubic millimeters');
        $this->registerUnitOfMeasure($new_unit);

        // Cubic centimeter
        $new_unit = new UnitOfMeasure(
            'cm^3',
            function ($x) {
                return $x / pow(10, -6);
            },
            function ($x) {
                return $x * pow(10, -6);
            }
        );
        $new_unit->addAlias('cm³');
        $new_unit->addAlias('cubic centimeter');
        $new_unit->addAlias('cubic centimeters');
        $this->registerUnitOfMeasure($new_unit);

        // Cubic decimeter
        $new_unit = new UnitOfMeasure(
            'dm^3',
            function ($x) {
                return $x / pow(10, -3);
            },
            function ($x) {
                return $x * pow(10, -3);
            }
        );
        $new_unit->addAlias('dm³');
        $new_unit->addAlias('cubic decimeter');
        $new_unit->addAlias('cubic decimeters');
        $this->registerUnitOfMeasure($new_unit);

        // Cubic kilometer
        $new_unit = new UnitOfMeasure(
            'km^3',
            function ($x) {
                return $x / 1000000000;
            },
            function ($x) {
                return $x * 1000000000;
            }
        );
        $new_unit->addAlias('km³');
        $new_unit->addAlias('cubic kilometer');
        $new_unit->addAlias('cubic kilometers');
        $this->registerUnitOfMeasure($new_unit);

        // Cubic foot
        $new_unit = new UnitOfMeasure(
            'ft^3',
            function ($x) {
                return $x / 0.03;
            },
            function ($x) {
                return $x * 0.03;
            }
        );
        $new_unit->addAlias('ft³');
        $new_unit->addAlias('cubic foot');
        $new_unit->addAlias('cubic feet');
        $this->registerUnitOfMeasure($new_unit);

        // Cubic inch
        $new_unit = new UnitOfMeasure(
            'in^3',
            function ($x) {
                return $x / 1.64 * pow(10, -5);
            },
            function ($x) {
                return $x * 1.64 * pow(10, -5);
            }
        );
        $new_unit->addAlias('in³');
        $new_unit->addAlias('cubic inch');
        $new_unit->addAlias('cubic inches');
        $this->registerUnitOfMeasure($new_unit);

        // Cubic yard
        $new_unit = new UnitOfMeasure(
            'yd^3',
            function ($x) {
                return $x / 0.76;
            },
            function ($x) {
                return $x * 0.76;
            }
        );
        $new_unit->addAlias('yd³');
        $new_unit->addAlias('cubic yard');
        $new_unit->addAlias('cubic yards');
        $this->registerUnitOfMeasure($new_unit);

        // Milliliters
        $new_unit = new UnitOfMeasure(
            'ml',
            function ($x) {
                return $x / pow(10, -6);
            },
            function ($x) {
                return $x * pow(10, -6);
            }
        );
        $new_unit->addAlias('milliliter');
        $new_unit->addAlias('milliliters');
        $this->registerUnitOfMeasure($new_unit);

        // Centiliters
        $new_unit = new UnitOfMeasure(
            'cl',
            function ($x) {
                return $x / pow(10, -5);
            },
            function ($x) {
                return $x * pow(10, -5);
            }
        );
        $new_unit->addAlias('centiliter');
        $new_unit->addAlias('centiliters');
        $this->registerUnitOfMeasure($new_unit);

        // Deciliter
        $new_unit = new UnitOfMeasure(
            'dl',
            function ($x) {
                return $x / pow(10, -4);
            },
            function ($x) {
                return $x * pow(10, -4);
            }
        );
        $new_unit->addAlias('deciliter');
        $new_unit->addAlias('deciliters');
        $this->registerUnitOfMeasure($new_unit);

        // Liter
        $new_unit = new UnitOfMeasure(
            'l',
            function ($x) {
                return $x / pow(10, -3);
            },
            function ($x) {
                return $x * pow(10, -3);
            }
        );
        $new_unit->addAlias('liter');
        $new_unit->addAlias('liters');
        $this->registerUnitOfMeasure($new_unit);

        // Decalitre
        $new_unit = new UnitOfMeasure(
            'dal',
            function ($x) {
                return $x / 0.01;
            },
            function ($x) {
                return $x * 0.01;
            }
        );
        $new_unit->addAlias('decalitre');
        $new_unit->addAlias('decalitres');
        $this->registerUnitOfMeasure($new_unit);

        // Hectolitre
        $new_unit = new UnitOfMeasure(
            'hl',
            function ($x) {
                return $x / 0.1;
            },
            function ($x) {
                return $x * 0.1;
            }
        );
        $new_unit->addAlias('hectolitre');
        $new_unit->addAlias('hectolitres');
        $this->registerUnitOfMeasure($new_unit);

        // Cup
        $new_unit = new UnitOfMeasure(
            'cup',
            function ($x) {
                return $x / 0.00023659;
            },
            function ($x) {
                return $x * 0.00023659;
            }
        );
        $new_unit->addAlias('cup');
        $new_unit->addAlias('cups');
        $this->registerUnitOfMeasure($new_unit);
    }
}
