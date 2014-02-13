<?php
namespace PhpUnitsOfMeasure\PhysicalQuantity;

use \PhpUnitsOfMeasure\PhysicalQuantity;
use \PhpUnitsOfMeasure\UnitOfMeasure;

class Angle extends PhysicalQuantity
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

        // Degrees
        $newUnit = new UnitOfMeasure(
            '°',
            function ($x) {
                return $x;
            },
            function ($x) {
                return $x;
            }
        );
        $newUnit->addAlias('deg');
        $newUnit->addAlias('degs');
        $newUnit->addAlias('degree');
        $newUnit->addAlias('degrees');
        $this->registerUnitOfMeasure($newUnit);

        // Radians
        $newUnit = new UnitOfMeasure(
            'rad',
            function ($x) {
                return $x * M_PI / 180;
            },
            function ($x) {
                return $x / M_PI * 180;
            }
        );
        $newUnit->addAlias('rads');
        $newUnit->addAlias('radian');
        $newUnit->addAlias('radians');
        $this->registerUnitOfMeasure($newUnit);
    }
}
