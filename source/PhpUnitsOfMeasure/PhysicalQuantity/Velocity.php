<?php
namespace PhpUnitsOfMeasure\PhysicalQuantity;

use \PhpUnitsOfMeasure\PhysicalQuantity;
use \PhpUnitsOfMeasure\UnitOfMeasure;

class Velocity extends PhysicalQuantity
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

        // meter per second
        $new_unit = new UnitOfMeasure(
            'm/s',
            function ($x) {
                return $x;
            },
            function ($x) {
                return $x;
            }
        );
        $new_unit->addAlias('meters per second');
        $new_unit->addAlias('meter per second');
        $this->registerUnitOfMeasure($new_unit);
    }
}
