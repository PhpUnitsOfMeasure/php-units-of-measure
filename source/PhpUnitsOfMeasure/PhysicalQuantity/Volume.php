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
        $newUnit = new UnitOfMeasure(
            'm^3',
            function ($x) {
                return $x;
            },
            function ($x) {
                return $x;
            }
        );
        $newUnit->addAlias('m³');
        $newUnit->addAlias('cubic meter');
        $newUnit->addAlias('cubic meters');
        $this->registerUnitOfMeasure($newUnit);

        // Cubic millimeter
        $newUnit = new UnitOfMeasure(
            'mm^3',
            function ($x) {
                return $x / 1e-9;
            },
            function ($x) {
                return $x * 1e-9;
            }
        );
        $newUnit->addAlias('mm³');
        $newUnit->addAlias('cubic millimeter');
        $newUnit->addAlias('cubic millimeters');
        $this->registerUnitOfMeasure($newUnit);

        // Cubic centimeter
        $newUnit = new UnitOfMeasure(
            'cm^3',
            function ($x) {
                return $x / 1e-6;
            },
            function ($x) {
                return $x * 1e-6;
            }
        );
        $newUnit->addAlias('cm³');
        $newUnit->addAlias('cubic centimeter');
        $newUnit->addAlias('cubic centimeters');
        $this->registerUnitOfMeasure($newUnit);

        // Cubic decimeter
        $newUnit = new UnitOfMeasure(
            'dm^3',
            function ($x) {
                return $x / 1e-3;
            },
            function ($x) {
                return $x * 1e-3;
            }
        );
        $newUnit->addAlias('dm³');
        $newUnit->addAlias('cubic decimeter');
        $newUnit->addAlias('cubic decimeters');
        $this->registerUnitOfMeasure($newUnit);

        // Cubic kilometer
        $newUnit = new UnitOfMeasure(
            'km^3',
            function ($x) {
                return $x / 1e9;
            },
            function ($x) {
                return $x * 1e9;
            }
        );
        $newUnit->addAlias('km³');
        $newUnit->addAlias('cubic kilometer');
        $newUnit->addAlias('cubic kilometers');
        $this->registerUnitOfMeasure($newUnit);

        // Cubic foot
        $newUnit = new UnitOfMeasure(
            'ft^3',
            function ($x) {
                return $x / 2.831685e-2;
            },
            function ($x) {
                return $x * 2.831685e-2;
            }
        );
        $newUnit->addAlias('ft³');
        $newUnit->addAlias('cubic foot');
        $newUnit->addAlias('cubic feet');
        $this->registerUnitOfMeasure($newUnit);

        // Cubic inch
        $newUnit = new UnitOfMeasure(
            'in^3',
            function ($x) {
                return $x / 1.638706e-5;
            },
            function ($x) {
                return $x * 1.638706e-5;
            }
        );
        $newUnit->addAlias('in³');
        $newUnit->addAlias('cubic inch');
        $newUnit->addAlias('cubic inches');
        $this->registerUnitOfMeasure($newUnit);

        // Cubic yard
        $newUnit = new UnitOfMeasure(
            'yd^3',
            function ($x) {
                return $x / 7.645549e-1;
            },
            function ($x) {
                return $x * 7.645549e-1;
            }
        );
        $newUnit->addAlias('yd³');
        $newUnit->addAlias('cubic yard');
        $newUnit->addAlias('cubic yards');
        $this->registerUnitOfMeasure($newUnit);

        // Milliliters
        $newUnit = new UnitOfMeasure(
            'ml',
            function ($x) {
                return $x / 1e-6;
            },
            function ($x) {
                return $x * 1e-6;
            }
        );
        $newUnit->addAlias('milliliter');
        $newUnit->addAlias('milliliters');
        $this->registerUnitOfMeasure($newUnit);

        // Centiliters
        $newUnit = new UnitOfMeasure(
            'cl',
            function ($x) {
                return $x / 1e-5;
            },
            function ($x) {
                return $x * 1e-5;
            }
        );
        $newUnit->addAlias('centiliter');
        $newUnit->addAlias('centiliters');
        $this->registerUnitOfMeasure($newUnit);

        // Deciliter
        $newUnit = new UnitOfMeasure(
            'dl',
            function ($x) {
                return $x / 1e-4;
            },
            function ($x) {
                return $x * 1e-4;
            }
        );
        $newUnit->addAlias('deciliter');
        $newUnit->addAlias('deciliters');
        $this->registerUnitOfMeasure($newUnit);

        // Liter
        $newUnit = new UnitOfMeasure(
            'l',
            function ($x) {
                return $x / 1e-3;
            },
            function ($x) {
                return $x * 1e-3;
            }
        );
        $newUnit->addAlias('liter');
        $newUnit->addAlias('liters');
        $this->registerUnitOfMeasure($newUnit);

        // Decaliter
        $newUnit = new UnitOfMeasure(
            'dal',
            function ($x) {
                return $x / 1e-2;
            },
            function ($x) {
                return $x * 1e-2;
            }
        );
        $newUnit->addAlias('decaliter');
        $newUnit->addAlias('decaliters');
        $this->registerUnitOfMeasure($newUnit);

        // Hectoliter
        $newUnit = new UnitOfMeasure(
            'hl',
            function ($x) {
                return $x / 1e-1;
            },
            function ($x) {
                return $x * 1e-1;
            }
        );
        $newUnit->addAlias('hectoliter');
        $newUnit->addAlias('hectoliters');
        $this->registerUnitOfMeasure($newUnit);

        // Cup
        $newUnit = new UnitOfMeasure(
            'cup',
            function ($x) {
                return $x / 2.365882e-4;
            },
            function ($x) {
                return $x * 2.365882e-4;
            }
        );
        $newUnit->addAlias('cup');
        $newUnit->addAlias('cups');
        $this->registerUnitOfMeasure($newUnit);
    }
}
