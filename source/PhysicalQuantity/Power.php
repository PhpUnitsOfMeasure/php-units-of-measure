<?php

namespace PhpUnitsOfMeasure\PhysicalQuantity;

use PhpUnitsOfMeasure\AbstractPhysicalQuantity;
use PhpUnitsOfMeasure\UnitOfMeasure;
use PhpUnitsOfMeasure\HasSIUnitsTrait;

class Power extends AbstractPhysicalQuantity
{
    use HasSIUnitsTrait;

    protected static $unitDefinitions;

    protected static function initialize()
    {
        // watt
        $kiloWatt = UnitOfMeasure::nativeUnitFactory('W');
        $kiloWatt->addAlias('watt');
        $kiloWatt->addAlias('watts');
        static::addUnit($kiloWatt);

        static::addMissingSIPrefixedUnits(
            $kiloWatt,
            1,
            '%pW',
            [
                '%Pwatt',
                '%Pwatts',
            ]
        );

        $metricHorsePower = UnitOfMeasure::linearUnitFactory('PS', 735.49875);
        $metricHorsePower->addAlias('pferdestärke'); // aka "metric horsepower"

        static::addUnit($metricHorsePower);
    }
}
