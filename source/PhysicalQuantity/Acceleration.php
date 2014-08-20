<?php
namespace PhpUnitsOfMeasure\PhysicalQuantity;

use PhpUnitsOfMeasure\PhysicalQuantity;
use PhpUnitsOfMeasure\UnitOfMeasure;

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
        $newUnit = UnitOfMeasure::nativeUnitFactory('m/s^2');
        $newUnit->addAlias('m/s²');
        $newUnit->addAlias('meter per second squared');
        $newUnit->addAlias('meters per second squared');
        $newUnit->addAlias('metre per second squared');
        $newUnit->addAlias('metres per second squared');
        $this->registerUnitOfMeasure($newUnit);
    }
}
