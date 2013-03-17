<?php
namespace PhpUnitsOfMeasure\PhysicalQuantity;

use \PhpUnitsOfMeasure\PhysicalQuantity;
use \PhpUnitsOfMeasure\UnitOfMeasure;

class Pressure extends PhysicalQuantity
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

        // Pascal
        $new_unit = new UnitOfMeasure(
            'Pa',
            function ($x) {
                return $x;
            },
            function ($x) {
                return $x;
            }
        );
        $new_unit->addAlias('pascal');
        $this->registerUnitOfMeasure($new_unit);

        // Atmosphere
        $new_unit = new UnitOfMeasure(
            'atm',
            function ($x) {
                return $x / 101325;
            },
            function ($x) {
                return $x * 101325;
            }
        );
        $new_unit->addAlias('atmosphere');
        $new_unit->addAlias('atmospheres');
        $this->registerUnitOfMeasure($new_unit);

        // Bar
        $new_unit = new UnitOfMeasure(
            'bar',
            function ($x) {
                return $x / 1e5;
            },
            function ($x) {
                return $x * 1e5;
            }
        );
        $new_unit->addAlias('bar');
        $this->registerUnitOfMeasure($new_unit);

        // Inch of Mercury
        $new_unit = new UnitOfMeasure(
            'inHg',
            function ($x) {
                return $x / 3.386389e3;
            },
            function ($x) {
                return $x * 3.386389e3;
            }
        );
        $new_unit->addAlias('inches of mercury');
        $this->registerUnitOfMeasure($new_unit);

        // Milimeter of Mercury
        $new_unit = new UnitOfMeasure(
            'mmHg',
            function ($x) {
                return $x / 133.3224;
            },
            function ($x) {
                return $x * 133.3224;
            }
        );
        $new_unit->addAlias('milimeters of mercury');
        $new_unit->addAlias('torr');
        $this->registerUnitOfMeasure($new_unit);

        // Pound per Square Inch
        $new_unit = new UnitOfMeasure(
            'psi',
            function ($x) {
                return $x / 6.894757e3;
            },
            function ($x) {
                return $x * 6.894757e3;
            }
        );
        $new_unit->addAlias('pounds per square inch');
        $this->registerUnitOfMeasure($new_unit);
    }
}
