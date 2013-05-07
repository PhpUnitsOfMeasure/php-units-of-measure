<?php
namespace PhpUnitsOfMeasure\PhysicalQuantity;

use \PhpUnitsOfMeasure\PhysicalQuantity;
use \PhpUnitsOfMeasure\UnitOfMeasure;

class Mass extends PhysicalQuantity
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

        // Kilogram
        $new_unit = new UnitOfMeasure(
            'kg',
            function ($x) {
                return $x;
            },
            function ($x) {
                return $x;
            }
        );
        $new_unit->addAlias('kilogram');
        $new_unit->addAlias('kilograms');
        $this->registerUnitOfMeasure($new_unit);

        // Milligram
        $new_unit = new UnitOfMeasure(
            'mg',
            function ($x) {
                return $x / pow(10, -6);
            },
            function ($x) {
                return $x * pow(10, -6);
            }
        );
        $new_unit->addAlias('milligram');
        $new_unit->addAlias('milligrams');
        $this->registerUnitOfMeasure($new_unit);

        // Centigram
        $new_unit = new UnitOfMeasure(
            'mg',
            function ($x) {
                return $x / pow(10, -5);
            },
            function ($x) {
                return $x * pow(10, -5);
            }
        );
        $new_unit->addAlias('centigram');
        $new_unit->addAlias('centigrams');
        $this->registerUnitOfMeasure($new_unit);

        // Gram
        $new_unit = new UnitOfMeasure(
            'g',
            function ($x) {
                return $x / pow(10, -3);
            },
            function ($x) {
                return $x * pow(10, -3);
            }
        );
        $new_unit->addAlias('gram');
        $new_unit->addAlias('grams');
        $this->registerUnitOfMeasure($new_unit);

        // Tonne
        $new_unit = new UnitOfMeasure(
            't',
            function ($x) {
                return $x / 1000;
            },
            function ($x) {
                return $x * 1000;
            }
        );
        $new_unit->addAlias('ton');
        $new_unit->addAlias('tons');
        $new_unit->addAlias('tonne');
        $new_unit->addAlias('tonnes');
        $this->registerUnitOfMeasure($new_unit);

        // Pound
        $new_unit = new UnitOfMeasure(
            'lb',
            function ($x) {
                return $x / 0.45;
            },
            function ($x) {
                return $x * 0.45;
            }
        );
        $new_unit->addAlias('pound');
        $new_unit->addAlias('pounds');
        $this->registerUnitOfMeasure($new_unit);

        // Ounce
        $new_unit = new UnitOfMeasure(
            'oz',
            function ($x) {
                return $x / 0.03;
            },
            function ($x) {
                return $x * 0.03;
            }
        );
        $new_unit->addAlias('ounce');
        $new_unit->addAlias('ounces');
        $this->registerUnitOfMeasure($new_unit);
    }
}
