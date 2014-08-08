<?php
namespace PhpUnitsOfMeasure\PhysicalQuantity;

use PhpUnitsOfMeasure\PhysicalQuantity;
use PhpUnitsOfMeasure\UnitOfMeasure;

class ElectricCurrent extends PhysicalQuantity
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

        // Ampere
        $newUnit = UnitOfMeasure::nativeUnitFactory('A');
        $newUnit->addAlias('amp');
        $newUnit->addAlias('amps');
        $newUnit->addAlias('ampere');
        $newUnit->addAlias('amperes');
        $this->registerUnitOfMeasure($newUnit);
    }
}
