<?php
namespace PhpUnitsOfMeasure\PhysicalQuantity;

use PhpUnitsOfMeasure\PhysicalQuantity;
use PhpUnitsOfMeasure\UnitOfMeasure;

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

        // Radians
        $radian = UnitOfMeasure::nativeUnitFactory('rad');
        $radian->addAlias('rads');
        $radian->addAlias('radian');
        $radian->addAlias('radians');
        $this->registerUnitOfMeasure($radian);

        // Degrees
        $newUnit = UnitOfMeasure::linearUnitFactory('°', M_PI / 180);
        $newUnit->addAlias('deg');
        $newUnit->addAlias('degs');
        $newUnit->addAlias('degree');
        $newUnit->addAlias('degrees');
        $this->registerUnitOfMeasure($newUnit);
    }
}
