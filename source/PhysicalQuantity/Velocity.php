<?php
namespace PhpUnitsOfMeasure\PhysicalQuantity;

use PhpUnitsOfMeasure\PhysicalQuantity;
use PhpUnitsOfMeasure\UnitOfMeasure;

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
        $meterpersecond = UnitOfMeasure::nativeUnitFactory('m/s');
        $meterpersecond->addAlias('meters per second');
        $meterpersecond->addAlias('meter per second');
        $meterpersecond->addAlias('metres per second');
        $meterpersecond->addAlias('metre per second');
        $this->registerUnitOfMeasure($meterpersecond);
    }
}
