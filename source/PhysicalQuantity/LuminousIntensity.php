<?php
namespace PhpUnitsOfMeasure\PhysicalQuantity;

use \PhpUnitsOfMeasure\PhysicalQuantity;
use \PhpUnitsOfMeasure\UnitOfMeasure;

class LuminousIntensity extends PhysicalQuantity
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

        // Candela
        $newUnit = UnitOfMeasure::NativeUnitFactory('cd');
        $newUnit->addAlias('candela');
        $this->registerUnitOfMeasure($newUnit);
    }
}
