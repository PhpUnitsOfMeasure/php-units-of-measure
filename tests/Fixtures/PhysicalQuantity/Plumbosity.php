<?php

namespace PhpUnitsOfMeasureTest\Fixtures\PhysicalQuantity;

use PhpUnitsOfMeasure\AbstractPhysicalQuantity;
use PhpUnitsOfMeasure\UnitOfMeasure;
use PhpUnitsOfMeasure\HasSIUnitsTrait;

/**
 * Fixture for HasSIUnitsTrait: a plain SI series and a pre-existing
 * unit that must not be overwritten by the generated one.
 */
class Plumbosity extends AbstractPhysicalQuantity
{
    use HasSIUnitsTrait;

    protected static $unitDefinitions;

    protected static function initialize()
    {
        $native = UnitOfMeasure::nativeUnitFactory('pb');
        $native->addAlias('plumb');
        static::addUnit($native);

        // Pre-existing unit with a non-standard factor, conflicts with the generated 'kpb'
        $custom = UnitOfMeasure::linearUnitFactory('kpb', 5);
        static::addUnit($custom);

        static::addMissingSIPrefixedUnits(
            $native,
            1,
            '%ppb',
            [
                '%Pplumb',
                '%Uplumb',
            ]
        );
    }
}
