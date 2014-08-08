<?php
namespace PhpUnitsOfMeasure\PhysicalQuantity;

use \PhpUnitsOfMeasure\PhysicalQuantity;
use \PhpUnitsOfMeasure\UnitOfMeasure;

class Area extends PhysicalQuantity
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

        // Meters squared
        $newUnit = UnitOfMeasure::NativeUnitFactory('m^2');
        $newUnit->addAlias('m²');
        $newUnit->addAlias('meter squared');
        $newUnit->addAlias('meters squared');
        $newUnit->addAlias('metre squared');
        $newUnit->addAlias('metres squared');
        $this->registerUnitOfMeasure($newUnit);

        // Millimeter squared
        $newUnit = UnitOfMeasure::LinearUnitFactory('mm^2', 1e-6);
        $newUnit->addAlias('mm²');
        $newUnit->addAlias('millimeter squared');
        $newUnit->addAlias('millimeters squared');
        $newUnit->addAlias('millimetre squared');
        $newUnit->addAlias('millimetres squared');
        $this->registerUnitOfMeasure($newUnit);

        // Centimeter squared
        $newUnit = UnitOfMeasure::LinearUnitFactory('cm^2', 1e-4);
        $newUnit->addAlias('cm²');
        $newUnit->addAlias('centimeter squared');
        $newUnit->addAlias('centimeters squared');
        $newUnit->addAlias('centimetre squared');
        $newUnit->addAlias('centimetres squared');
        $this->registerUnitOfMeasure($newUnit);

        // Decimeter squared
        $newUnit = UnitOfMeasure::LinearUnitFactory('dm^2', 1e-2);
        $newUnit->addAlias('dm²');
        $newUnit->addAlias('decimeter squared');
        $newUnit->addAlias('decimeters squared');
        $newUnit->addAlias('decimetre squared');
        $newUnit->addAlias('decimetres squared');
        $this->registerUnitOfMeasure($newUnit);

        // Kilometer squared
        $newUnit = UnitOfMeasure::LinearUnitFactory('km^2', 1e6);
        $newUnit->addAlias('km²');
        $newUnit->addAlias('kilometer squared');
        $newUnit->addAlias('kilometers squared');
        $newUnit->addAlias('kilometre squared');
        $newUnit->addAlias('kilometres squared');
        $this->registerUnitOfMeasure($newUnit);

        // Foot squared
        $newUnit = UnitOfMeasure::LinearUnitFactory('ft^2', 9.290304e-2);
        $newUnit->addAlias('ft²');
        $newUnit->addAlias('foot squared');
        $newUnit->addAlias('feet squared');
        $this->registerUnitOfMeasure($newUnit);

        // Inch squared
        $newUnit = UnitOfMeasure::LinearUnitFactory('in^2', 6.4516e-4);
        $newUnit->addAlias('in²');
        $newUnit->addAlias('inch squared');
        $newUnit->addAlias('inches squared');
        $this->registerUnitOfMeasure($newUnit);

        // Mile squared
        $newUnit = UnitOfMeasure::LinearUnitFactory('mi^2', 2.589988e6);
        $newUnit->addAlias('mi²');
        $newUnit->addAlias('mile squared');
        $newUnit->addAlias('miles squared');
        $this->registerUnitOfMeasure($newUnit);

        // Yard squared
        $newUnit = UnitOfMeasure::LinearUnitFactory('yd^2', 8.361274e-1);
        $newUnit->addAlias('yd²');
        $newUnit->addAlias('yard squared');
        $newUnit->addAlias('yards squared');
        $this->registerUnitOfMeasure($newUnit);

        // Hectare
        $newUnit = UnitOfMeasure::LinearUnitFactory('ha', 10000);
        $newUnit->addAlias('hectare');
        $newUnit->addAlias('hectares');
        $this->registerUnitOfMeasure($newUnit);


        // International Acre
        $newUnit = UnitOfMeasure::LinearUnitFactory('ac', 4046.8564224);
        $newUnit->addAlias('acre');
        $newUnit->addAlias('acres');
        $this->registerUnitOfMeasure($newUnit);
    }
}
