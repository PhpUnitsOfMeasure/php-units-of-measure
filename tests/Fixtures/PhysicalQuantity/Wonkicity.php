<?php

namespace PhpUnitsOfMeasureTest\Fixtures\PhysicalQuantity;

use PhpUnitsOfMeasure\AbstractPhysicalQuantity;
use PhpUnitsOfMeasure\UnitOfMeasure;

class Wonkicity extends AbstractPhysicalQuantity
{
    protected static $unitDefinitions;

    protected static function initialize()
    {
        $native = UnitOfMeasure::nativeUnitFactory('u');
        $native->addAlias('uvee');
        $native->addAlias('uvees');
        static::addUnit($native);

        $unit = UnitOfMeasure::linearUnitFactory('v', 3.5);
        $unit->addAlias('vorp');
        $unit->addAlias('vorps');
        static::addUnit($unit);
    }
}
