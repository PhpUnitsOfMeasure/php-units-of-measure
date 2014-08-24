<?php
namespace PhpUnitsOfMeasure\PhysicalQuantity;

use PhpUnitsOfMeasure\PhysicalQuantity;
use PhpUnitsOfMeasure\UnitOfMeasure;
use PhpUnitsOfMeasure\HasSIUnitsTrait;

class Length extends PhysicalQuantity
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

        // Meter
        $meter = UnitOfMeasure::nativeUnitFactory('m');
        $meter->addAlias('meter');
        $meter->addAlias('meters');
        $meter->addAlias('metre');
        $meter->addAlias('metres');
        $this->registerUnitOfMeasure($meter);

        $this->addMissingSIPrefixedUnits(
            $meter,
            1,
            '%pm',
            [
                '%Pmeter',
                '%Pmeters',
                '%Pmetre',
                '%Pmetres'
            ]
        );

        // Foot
        $newUnit = UnitOfMeasure::linearUnitFactory('ft', 0.3048);
        $newUnit->addAlias('foot');
        $newUnit->addAlias('feet');
        $this->registerUnitOfMeasure($newUnit);

        // Inch
        $newUnit = UnitOfMeasure::linearUnitFactory('in', 0.0254);
        $newUnit->addAlias('inch');
        $newUnit->addAlias('inches');
        $this->registerUnitOfMeasure($newUnit);

        // Mile
        $newUnit = UnitOfMeasure::linearUnitFactory('mi', 1609.344);
        $newUnit->addAlias('mile');
        $newUnit->addAlias('miles');
        $this->registerUnitOfMeasure($newUnit);

        // Yard
        $newUnit = UnitOfMeasure::linearUnitFactory('yd', 0.9144);
        $newUnit->addAlias('yard');
        $newUnit->addAlias('yards');
        $this->registerUnitOfMeasure($newUnit);
    }
}
