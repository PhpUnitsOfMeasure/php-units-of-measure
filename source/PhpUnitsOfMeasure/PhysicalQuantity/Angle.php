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
        $new_unit = new UnitOfMeasure(
            '°',
            function ($x) {
                return $x;
            },
            function ($x) {
                return $x;
            }
        );
        $new_unit->addAlias('deg');
        $new_unit->addAlias('degs');
        $new_unit->addAlias('degree');
        $new_unit->addAlias('degrees');
        $this->registerUnitOfMeasure($new_unit);

        // Radians
        $new_unit = new UnitOfMeasure(
            'rad',
            function ($x) {
                return $x * M_PI / 180;
            },
            function ($x) {
                return $x / M_PI * 180;
            }
        );
        $new_unit->addAlias('rads');
        $new_unit->addAlias('radian');
        $new_unit->addAlias('radians');
        $this->registerUnitOfMeasure($new_unit);
    }
}
