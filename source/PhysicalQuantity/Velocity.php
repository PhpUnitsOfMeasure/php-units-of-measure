<?php
namespace PhpUnitsOfMeasure\PhysicalQuantity;

use PhpUnitsOfMeasure\AbstractPhysicalQuantity;
use PhpUnitsOfMeasure\UnitOfMeasure;

class Velocity extends AbstractPhysicalQuantity
{
    protected static $unitDefinitions;

    protected static function initialize()
    {
        // meter per second
        $meterpersecond = UnitOfMeasure::nativeUnitFactory('m/s');
        $meterpersecond->addAlias('meters per second');
        $meterpersecond->addAlias('meter per second');
        $meterpersecond->addAlias('metres per second');
        $meterpersecond->addAlias('metre per second');
        static::addUnit($meterpersecond);
    }
}
