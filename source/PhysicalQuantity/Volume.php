<?php
namespace PhpUnitsOfMeasure\PhysicalQuantity;

use \PhpUnitsOfMeasure\PhysicalQuantity;
use \PhpUnitsOfMeasure\UnitOfMeasure;

class Volume extends PhysicalQuantity
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

        // Cubic meter
        $newUnit = UnitOfMeasure::NativeUnitFactory('m^3');
        $newUnit->addAlias('m³');
        $newUnit->addAlias('cubic meter');
        $newUnit->addAlias('cubic meters');
        $newUnit->addAlias('cubic metre');
        $newUnit->addAlias('cubic metres');
        $this->registerUnitOfMeasure($newUnit);

        // Cubic millimeter
        $newUnit = UnitOfMeasure::LinearUnitFactory('mm^3', 1e-9);
        $newUnit->addAlias('mm³');
        $newUnit->addAlias('cubic millimeter');
        $newUnit->addAlias('cubic millimeters');
        $newUnit->addAlias('cubic millimetre');
        $newUnit->addAlias('cubic millimetres');
        $this->registerUnitOfMeasure($newUnit);

        // Cubic centimeter
        $newUnit = UnitOfMeasure::LinearUnitFactory('cm^3', 1e-6);
        $newUnit->addAlias('cm³');
        $newUnit->addAlias('cubic centimeter');
        $newUnit->addAlias('cubic centimeters');
        $newUnit->addAlias('cubic centimetre');
        $newUnit->addAlias('cubic centimetres');
        $this->registerUnitOfMeasure($newUnit);

        // Cubic decimeter
        $newUnit = UnitOfMeasure::LinearUnitFactory('dm^3', 1e-3);
        $newUnit->addAlias('dm³');
        $newUnit->addAlias('cubic decimeter');
        $newUnit->addAlias('cubic decimeters');
        $newUnit->addAlias('cubic decimetre');
        $newUnit->addAlias('cubic decimetres');
        $this->registerUnitOfMeasure($newUnit);

        // Cubic kilometer
        $newUnit = UnitOfMeasure::LinearUnitFactory('km^3', 1e9);
        $newUnit->addAlias('km³');
        $newUnit->addAlias('cubic kilometer');
        $newUnit->addAlias('cubic kilometers');
        $newUnit->addAlias('cubic kilometre');
        $newUnit->addAlias('cubic kilometres');
        $this->registerUnitOfMeasure($newUnit);

        // Cubic foot
        $newUnit = UnitOfMeasure::LinearUnitFactory('ft^3', 2.831685e-2);
        $newUnit->addAlias('ft³');
        $newUnit->addAlias('cubic foot');
        $newUnit->addAlias('cubic feet');
        $this->registerUnitOfMeasure($newUnit);

        // Cubic inch
        $newUnit = UnitOfMeasure::LinearUnitFactory('in^3', 1.638706e-5);
        $newUnit->addAlias('in³');
        $newUnit->addAlias('cubic inch');
        $newUnit->addAlias('cubic inches');
        $this->registerUnitOfMeasure($newUnit);

        // Cubic yard
        $newUnit = UnitOfMeasure::LinearUnitFactory('yd^3', 7.645549e-1);
        $newUnit->addAlias('yd³');
        $newUnit->addAlias('cubic yard');
        $newUnit->addAlias('cubic yards');
        $this->registerUnitOfMeasure($newUnit);

        // Milliliters
        $newUnit = UnitOfMeasure::LinearUnitFactory('ml', 1e-6);
        $newUnit->addAlias('milliliter');
        $newUnit->addAlias('milliliters');
        $newUnit->addAlias('millilitre');
        $newUnit->addAlias('millilitres');
        $this->registerUnitOfMeasure($newUnit);

        // Centiliters
        $newUnit = UnitOfMeasure::LinearUnitFactory('cl', 1e-5);
        $newUnit->addAlias('centiliter');
        $newUnit->addAlias('centiliters');
        $newUnit->addAlias('centilitre');
        $newUnit->addAlias('centilitres');
        $this->registerUnitOfMeasure($newUnit);

        // Deciliter
        $newUnit = UnitOfMeasure::LinearUnitFactory('dl', 1e-4);
        $newUnit->addAlias('deciliter');
        $newUnit->addAlias('deciliters');
        $newUnit->addAlias('decilitre');
        $newUnit->addAlias('decilitres');
        $this->registerUnitOfMeasure($newUnit);

        // Liter
        $newUnit = UnitOfMeasure::LinearUnitFactory('l', 1e-3);
        $newUnit->addAlias('liter');
        $newUnit->addAlias('liters');
        $newUnit->addAlias('litre');
        $newUnit->addAlias('litres');
        $this->registerUnitOfMeasure($newUnit);

        // Decaliter
        $newUnit = UnitOfMeasure::LinearUnitFactory('dal', 1e-2);
        $newUnit->addAlias('decaliter');
        $newUnit->addAlias('decaliters');
        $newUnit->addAlias('decalitre');
        $newUnit->addAlias('decalitres');
        $this->registerUnitOfMeasure($newUnit);

        // Hectoliter
        $newUnit = UnitOfMeasure::LinearUnitFactory('hl', 1e-1);
        $newUnit->addAlias('hectoliter');
        $newUnit->addAlias('hectoliters');
        $newUnit->addAlias('hectolitre');
        $newUnit->addAlias('hectolitres');
        $this->registerUnitOfMeasure($newUnit);

        // Cup
        $newUnit = UnitOfMeasure::LinearUnitFactory('cup', 2.365882e-4);
        $newUnit->addAlias('cup');
        $newUnit->addAlias('cups');
        $this->registerUnitOfMeasure($newUnit);
    }
}
