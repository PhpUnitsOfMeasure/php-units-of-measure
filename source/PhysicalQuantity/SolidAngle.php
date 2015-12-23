<?php
namespace PhpUnitsOfMeasure\PhysicalQuantity;

use PhpUnitsOfMeasure\AbstractPhysicalQuantity;
use PhpUnitsOfMeasure\UnitOfMeasure;
use PhpUnitsOfMeasure\HasSIUnitsTrait;

class SolidAngle extends AbstractPhysicalQuantity
{
    use HasSIUnitsTrait;

    protected static $unitDefinitions;

    protected static function initialize()
    {
        // Steradians
        $steradian = UnitOfMeasure::nativeUnitFactory('sr');
        $steradian->addAlias('steradian');
        $steradian->addAlias('steradians');
        static::addUnit($steradian);

        static::addMissingSIPrefixedUnits(
            $steradian,
            1,
            '%psr',
            [
                '%Psteradian',
                '%Psteradians',
            ]
        );
    }
}
