<?php
namespace PhpUnitsOfMeasure\PhysicalQuantity;

use PhpUnitsOfMeasure\PhysicalQuantity;
use PhpUnitsOfMeasure\UnitOfMeasure;
use PhpUnitsOfMeasure\HasSIUnitsTrait;

class Pressure extends PhysicalQuantity
{
    use HasSIUnitsTrait;

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
        $pascal = UnitOfMeasure::nativeUnitFactory('Pa');
        $pascal->addAlias('pascal');
        $this->registerUnitOfMeasure($pascal);

        $this->addMissingSIPrefixedUnits(
            $pascal,
            1,
            '%pPa',
            [
                '%Ppascal',
            ]
        );

        // Atmosphere
        $newUnit = UnitOfMeasure::linearUnitFactory('atm', 101325);
        $newUnit->addAlias('atmosphere');
        $newUnit->addAlias('atmospheres');
        $this->registerUnitOfMeasure($newUnit);

        // Bar
        $bar = UnitOfMeasure::linearUnitFactory('bar', 1e5);
        $this->registerUnitOfMeasure($bar);

        $this->addMissingSIPrefixedUnits(
            $bar,
            1,
            '%pbar'
        );

        // Inch of Mercury
        $newUnit = UnitOfMeasure::linearUnitFactory('inHg', 3.386389e3);
        $newUnit->addAlias('inches of mercury');
        $this->registerUnitOfMeasure($newUnit);

        // Millimeter of Mercury
        $newUnit = UnitOfMeasure::linearUnitFactory('mmHg', 133.3224);
        $newUnit->addAlias('millimeters of mercury');
        $newUnit->addAlias('millimetres of mercury');
        $newUnit->addAlias('torr');
        $this->registerUnitOfMeasure($newUnit);

        // Pound per Square Inch
        $newUnit = UnitOfMeasure::linearUnitFactory('psi', 6.894757e3);
        $newUnit->addAlias('pounds per square inch');
        $this->registerUnitOfMeasure($newUnit);
    }
}
