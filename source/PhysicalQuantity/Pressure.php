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
        $newUnit = new UnitOfMeasure(
            'Pa',
            function ($x) {
                return $x;
            },
            function ($x) {
                return $x;
            }
        );
        $newUnit->addAlias('pascal');
        $this->registerUnitOfMeasure($newUnit);

        // Atmosphere
        $newUnit = new UnitOfMeasure(
            'atm',
            function ($x) {
                return $x / 101325;
            },
            function ($x) {
                return $x * 101325;
            }
        );
        $newUnit->addAlias('atmosphere');
        $newUnit->addAlias('atmospheres');
        $this->registerUnitOfMeasure($newUnit);

        // Bar
        $newUnit = new UnitOfMeasure(
            'bar',
            function ($x) {
                return $x / 1e5;
            },
            function ($x) {
                return $x * 1e5;
            }
        );
        $newUnit->addAlias('bar');
        $this->registerUnitOfMeasure($newUnit);

        // Inch of Mercury
        $newUnit = new UnitOfMeasure(
            'inHg',
            function ($x) {
                return $x / 3.386389e3;
            },
            function ($x) {
                return $x * 3.386389e3;
            }
        );
        $newUnit->addAlias('inches of mercury');
        $this->registerUnitOfMeasure($newUnit);

        // Milimeter of Mercury
        $newUnit = new UnitOfMeasure(
            'mmHg',
            function ($x) {
                return $x / 133.3224;
            },
            function ($x) {
                return $x * 133.3224;
            },
            array(
                'milimeters of mercury',
                'milimetres of mercury',
                'torr'
            )
        );
        $this->registerUnitOfMeasure($newUnit);

        // Pound per Square Inch
        $newUnit = new UnitOfMeasure(
            'psi',
            function ($x) {
                return $x / 6.894757e3;
            },
            function ($x) {
                return $x * 6.894757e3;
            }
        );
        $newUnit->addAlias('pounds per square inch');
        $this->registerUnitOfMeasure($newUnit);
    }
}
