<?php

namespace PhpUnitsOfMeasureTest\Fixtures\PhysicalQuantity;

use PhpUnitsOfMeasure\AbstractPhysicalQuantity;
use PhpUnitsOfMeasure\UnitOfMeasure;

class Wigginess extends AbstractPhysicalQuantity
{
    protected static $unitDefinitions;

    protected static function initialize()
    {
        $native = UnitOfMeasure::nativeUnitFactory('s');
        $native->addAlias('sopee');
        $native->addAlias('sopees');
        static::addUnit($native);

        $unit = UnitOfMeasure::linearUnitFactory('t', 2.5);
        $unit->addAlias('tumpet');
        $unit->addAlias('tumpets');
        static::addUnit($unit);
    }
}
