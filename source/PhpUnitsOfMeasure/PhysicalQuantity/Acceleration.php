<?php
namespace PhpUnitsOfMeasure\PhysicalQuantity;

use \PhpUnitsOfMeasure\PhysicalQuantity;
use \PhpUnitsOfMeasure\UnitOfMeasure;

class Acceleration extends PhysicalQuantity
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

        // meters per second squared
        $new_unit = new UnitOfMeasure(
            'm/s^2',
            function ($x) {
                return $x;
            },
            function ($x) {
                return $x;
            },
            array(
                'm/s²',
                'meter per second squared',
                'meters per second squared'
            )
        );
        $this->registerUnitOfMeasure($new_unit);
    }
}
