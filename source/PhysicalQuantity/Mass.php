<?php
namespace PhpUnitsOfMeasure\PhysicalQuantity;

use PhpUnitsOfMeasure\PhysicalQuantity;
use PhpUnitsOfMeasure\UnitOfMeasure;
use PhpUnitsOfMeasure\HasSIUnitsTrait;

class Mass extends PhysicalQuantity
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

        // Kilogram
        $kilogram = UnitOfMeasure::nativeUnitFactory('kg');
        $kilogram->addAlias('kilogram');
        $kilogram->addAlias('kilograms');
        $this->registerUnitOfMeasure($kilogram);

        $this->addMissingSIPrefixedUnits(
            $kilogram,
            1e-3,
            '%pg',
            [
                '%Pgram',
                '%Pgrams',
            ]
        );

        // Tonne (metric)
        $newUnit = UnitOfMeasure::linearUnitFactory('t', 1e3);
        $newUnit->addAlias('ton');
        $newUnit->addAlias('tons');
        $newUnit->addAlias('tonne');
        $newUnit->addAlias('tonnes');
        $this->registerUnitOfMeasure($newUnit);

        // Pound
        $newUnit = UnitOfMeasure::linearUnitFactory('lb', 4.535924e-1);
        $newUnit->addAlias('lbs');
        $newUnit->addAlias('pound');
        $newUnit->addAlias('pounds');
        $this->registerUnitOfMeasure($newUnit);

        // Ounce
        $newUnit = UnitOfMeasure::linearUnitFactory('oz', 2.834952e-2);
        $newUnit->addAlias('ounce');
        $newUnit->addAlias('ounces');
        $this->registerUnitOfMeasure($newUnit);
    }
}
