<?php
namespace PhpUnitsOfMeasure\PhysicalQuantity;

use \PhpUnitsOfMeasure\PhysicalQuantity;
use \PhpUnitsOfMeasure\UnitOfMeasure;

class Pressure extends PhysicalQuantity
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

        // Pascal
        $newUnit = UnitOfMeasure::NativeUnitFactory('Pa');
        $newUnit->addAlias('pascal');
        $this->registerUnitOfMeasure($newUnit);

        // Atmosphere
        $newUnit = UnitOfMeasure::LinearUnitFactory('atm', 101325);
        $newUnit->addAlias('atmosphere');
        $newUnit->addAlias('atmospheres');
        $this->registerUnitOfMeasure($newUnit);

        // Bar
        $newUnit = UnitOfMeasure::LinearUnitFactory('bar', 1e5);
        $newUnit->addAlias('bar');
        $this->registerUnitOfMeasure($newUnit);

        // Inch of Mercury
        $newUnit = UnitOfMeasure::LinearUnitFactory('inHg', 3.386389e3);
        $newUnit->addAlias('inches of mercury');
        $this->registerUnitOfMeasure($newUnit);

        // Milimeter of Mercury
        $newUnit = UnitOfMeasure::LinearUnitFactory('mmHg', 133.3224);
        $newUnit->addAlias('milimeters of mercury');
        $newUnit->addAlias('milimetres of mercury');
        $newUnit->addAlias('torr');
        $this->registerUnitOfMeasure($newUnit);

        // Pound per Square Inch
        $newUnit = UnitOfMeasure::LinearUnitFactory('psi', 6.894757e3);
        $newUnit->addAlias('pounds per square inch');
        $this->registerUnitOfMeasure($newUnit);
    }
}
