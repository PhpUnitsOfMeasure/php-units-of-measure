<?php

namespace PhpUnitsOfMeasureTest\Fixtures\PhysicalQuantity;

use PhpUnitsOfMeasure\AbstractPhysicalQuantity;
use PhpUnitsOfMeasure\UnitOfMeasure;
use PhpUnitsOfMeasure\HasSIUnitsTrait;

class Woogosity extends AbstractPhysicalQuantity
{
    use HasSIUnitsTrait;

    protected static $unitDefinitions;

    protected static function initialize()
    {
        $native = UnitOfMeasure::nativeUnitFactory('l');
        $native->addAlias('lupee');
        $native->addAlias('lupees');
        static::addUnit($native);
        static::addMissingSIPrefixedUnits(
            $native,
            1,
            '%pl',
            [
                '%Plupee',
                '%Plupees',
            ]
        );

        $unit = UnitOfMeasure::linearUnitFactory('p', 4.5);
        $unit->addAlias('plurp');
        $unit->addAlias('plurps');
        static::addUnit($unit);
    }
}
