<?php
namespace PhpUnitsOfMeasure\PhysicalQuantity;

use PhpUnitsOfMeasure\PhysicalQuantity;
use PhpUnitsOfMeasure\UnitOfMeasure;

class Acceleration extends PhysicalQuantity
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

        // meters per second squared
        $meterpersecondsquared = UnitOfMeasure::nativeUnitFactory('m/s^2');
        $meterpersecondsquared->addAlias('m/s²');
        $meterpersecondsquared->addAlias('meter per second squared');
        $meterpersecondsquared->addAlias('meters per second squared');
        $meterpersecondsquared->addAlias('metre per second squared');
        $meterpersecondsquared->addAlias('metres per second squared');
        $this->registerUnitOfMeasure($meterpersecondsquared);
    }
}
