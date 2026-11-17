<?php

namespace PhpUnitsOfMeasureTest\Fixtures\PhysicalQuantity;

use PhpUnitsOfMeasure\AbstractPhysicalQuantity;
use PhpUnitsOfMeasure\UnitOfMeasure;
use PhpUnitsOfMeasure\HasSIUnitsTrait;

/**
 * Fixture for HasSIUnitsTrait: a squared SI series generated from
 * a prefixed (kilo) seed unit.
 */
class SquarePlumbosity extends AbstractPhysicalQuantity
{
    use HasSIUnitsTrait;

    protected static $unitDefinitions;

    protected static function initialize()
    {
        $native = UnitOfMeasure::nativeUnitFactory('pb^2');
        static::addUnit($native);

        $seed = UnitOfMeasure::linearUnitFactory('kpb^2', 1e6);
        static::addUnit($seed);

        static::addMissingSIPrefixedUnits(
            $seed,
            1e-6,
            '%ppb^2',
            [],
            2
        );
    }
}
