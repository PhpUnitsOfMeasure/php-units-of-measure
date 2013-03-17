<?php
namespace PhpUnitsOfMeasure\PhysicalQuantity;

use \PhpUnitsOfMeasure\PhysicalQuantity;
use \PhpUnitsOfMeasure\UnitOfMeasure;

class ElectricCurrent extends PhysicalQuantity
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

        // Ampere
        $new_unit = new UnitOfMeasure(
            'A',
            function ($x) {
                return $x;
            },
            function ($x) {
                return $x;
            }
        );
        $new_unit->addAlias('amp');
        $new_unit->addAlias('amps');
        $new_unit->addAlias('ampere');
        $new_unit->addAlias('amperes');
        $this->registerUnitOfMeasure($new_unit);
    }
}
