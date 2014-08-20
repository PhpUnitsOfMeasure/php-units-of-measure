<?php
namespace PhpUnitsOfMeasure\PhysicalQuantity;

use PhpUnitsOfMeasure\PhysicalQuantity;
use PhpUnitsOfMeasure\UnitOfMeasure;

class Mass extends PhysicalQuantity
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

        // Kilogram
        $newUnit = UnitOfMeasure::nativeUnitFactory('kg');
        $newUnit->addAlias('kilogram');
        $newUnit->addAlias('kilograms');
        $this->registerUnitOfMeasure($newUnit);

        // Milligram
        $newUnit = UnitOfMeasure::linearUnitFactory('mg', 1e-6);
        $newUnit->addAlias('milligram');
        $newUnit->addAlias('milligrams');
        $this->registerUnitOfMeasure($newUnit);

        // Centigram
        $newUnit = UnitOfMeasure::linearUnitFactory('cg', 1e-5);
        $newUnit->addAlias('centigram');
        $newUnit->addAlias('centigrams');
        $this->registerUnitOfMeasure($newUnit);

        // Gram
        $newUnit = UnitOfMeasure::linearUnitFactory('g', 1e-3);
        $newUnit->addAlias('gram');
        $newUnit->addAlias('grams');
        $this->registerUnitOfMeasure($newUnit);

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
