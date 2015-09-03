<?php

namespace PhpUnitsOfMeasureTest\Fixtures\PhysicalQuantity;

use PhpUnitsOfMeasure\AbstractPhysicalQuantity;
use PhpUnitsOfMeasure\UnitOfMeasure;

class InvalidQuantity extends AbstractPhysicalQuantity
{
    protected static $unitDefinitions;

    protected static function initialize()
    {
        $unit = UnitOfMeasure::linearUnitFactory('x', 4.5);
        $unit->addAlias('foo');
        static::addUnit($unit);
    }
}
