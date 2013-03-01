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

        // meters squared
        $new_unit = new UnitOfMeasure(
            'm^2',
            function ($x) { return $x; },
            function ($x) { return $x; }
        );
        $new_unit->addAlias('meter squared');
        $new_unit->addAlias('meters squared');
        $this->registerUnitOfMeasure($new_unit);
    }
}
