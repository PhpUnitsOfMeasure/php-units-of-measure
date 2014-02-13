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
        $newUnit = new UnitOfMeasure(
            'kg',
            function ($x) {
                return $x;
            },
            function ($x) {
                return $x;
            }
        );
        $newUnit->addAlias('kilogram');
        $newUnit->addAlias('kilograms');
        $this->registerUnitOfMeasure($newUnit);

        // Milligram
        $newUnit = new UnitOfMeasure(
            'mg',
            function ($x) {
                return $x / 1e-6;
            },
            function ($x) {
                return $x * 1e-6;
            }
        );
        $newUnit->addAlias('milligram');
        $newUnit->addAlias('milligrams');
        $this->registerUnitOfMeasure($newUnit);

        // Centigram
        $newUnit = new UnitOfMeasure(
            'cg',
            function ($x) {
                return $x / 1e-5;
            },
            function ($x) {
                return $x * 1e-5;
            }
        );
        $newUnit->addAlias('centigram');
        $newUnit->addAlias('centigrams');
        $this->registerUnitOfMeasure($newUnit);

        // Gram
        $newUnit = new UnitOfMeasure(
            'g',
            function ($x) {
                return $x / 1e-3;
            },
            function ($x) {
                return $x * 1e-3;
            }
        );
        $newUnit->addAlias('gram');
        $newUnit->addAlias('grams');
        $this->registerUnitOfMeasure($newUnit);

        // Tonne (metric)
        $newUnit = new UnitOfMeasure(
            't',
            function ($x) {
                return $x / 1e3;
            },
            function ($x) {
                return $x * 1e3;
            }
        );
        $newUnit->addAlias('ton');
        $newUnit->addAlias('tons');
        $newUnit->addAlias('tonne');
        $newUnit->addAlias('tonnes');
        $this->registerUnitOfMeasure($newUnit);

        // Pound
        $newUnit = new UnitOfMeasure(
            'lb',
            function ($x) {
                return $x / 4.535924e-1;
            },
            function ($x) {
                return $x * 4.535924e-1;
            }
        );
        $newUnit->addAlias('lbs');
        $newUnit->addAlias('pound');
        $newUnit->addAlias('pounds');
        $this->registerUnitOfMeasure($newUnit);

        // Ounce
        $newUnit = new UnitOfMeasure(
            'oz',
            function ($x) {
                return $x / 2.834952e-2;
            },
            function ($x) {
                return $x * 2.834952e-2;
            }
        );
        $newUnit->addAlias('ounce');
        $newUnit->addAlias('ounces');
        $this->registerUnitOfMeasure($newUnit);
    }
}
