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
        $new_unit = new UnitOfMeasure(
            'm^3',
            function ($x) { return $x; },
            function ($x) { return $x; }
        );
        $new_unit->addAlias('cubic meter');
        $new_unit->addAlias('cubic meters');
        $this->registerUnitOfMeasure($new_unit);
    }
}
