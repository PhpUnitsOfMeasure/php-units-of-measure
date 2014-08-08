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
        $newUnit = UnitOfMeasure::NativeUnitFactory('m/s');
        $newUnit->addAlias('meters per second');
        $newUnit->addAlias('meter per second');
        $newUnit->addAlias('metres per second');
        $newUnit->addAlias('metre per second');
        $this->registerUnitOfMeasure($newUnit);
    }
}
