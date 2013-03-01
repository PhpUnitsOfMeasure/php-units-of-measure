<?php
namespace PhpUnitsOfMeasure;

class Length extends PhysicalQuantity
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

        // Meters
        $new_unit = new UnitOfMeasure(
            'm',
            function ($x) { return $x; },
            function ($x) { return $x; }
        );
        $new_unit->addAlias('meter');
        $new_unit->addAlias('meters');
        $this->registerUnitOfMeasure($new_unit);

        // Feet
        $new_unit = new UnitOfMeasure(
            'ft',
            function ($x) { return $x / 0.3048; },
            function ($x) { return $x * 0.3048; }
        );
        $new_unit->addAlias('foot');
        $new_unit->addAlias('feet');
        $this->registerUnitOfMeasure($new_unit);

        // Inches
        $new_unit = new UnitOfMeasure(
            'in',
            function ($x) { return $x / 0.0254; },
            function ($x) { return $x * 0.0254; }
        );
        $new_unit->addAlias('inch');
        $new_unit->addAlias('inches');
        $this->registerUnitOfMeasure($new_unit);

        // Miles
        $new_unit = new UnitOfMeasure(
            'mi',
            function ($x) { return $x / 1609.344; },
            function ($x) { return $x * 1609.344; }
        );
        $new_unit->addAlias('mile');
        $new_unit->addAlias('miles');
        $this->registerUnitOfMeasure($new_unit);

        // Yards
        $new_unit = new UnitOfMeasure(
            'yd',
            function ($x) { return $x / 0.9144; },
            function ($x) { return $x * 0.9144; }
        );
        $new_unit->addAlias('yard');
        $new_unit->addAlias('yards');
        $this->registerUnitOfMeasure($new_unit);
    }
}
