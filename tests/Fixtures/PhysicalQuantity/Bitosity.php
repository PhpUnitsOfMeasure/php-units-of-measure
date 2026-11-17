<?php

namespace PhpUnitsOfMeasureTest\Fixtures\PhysicalQuantity;

use PhpUnitsOfMeasure\AbstractPhysicalQuantity;
use PhpUnitsOfMeasure\UnitOfMeasure;
use PhpUnitsOfMeasure\HasIECUnitsTrait;

/**
 * Fixture for HasIECUnitsTrait: one series with decimal SI prefixes
 * (default base) and one with SI prefixes on base 1024.
 */
class Bitosity extends AbstractPhysicalQuantity
{
    use HasIECUnitsTrait;

    protected static $unitDefinitions;

    protected static function initialize()
    {
        $dec = UnitOfMeasure::nativeUnitFactory('d');
        $dec->addAlias('dec');
        static::addUnit($dec);

        static::addMissingIECPrefixedUnits(
            $dec,
            1,
            '%Pdec',
            [
                '%pd',
                '%Udec',
            ]
        );

        $bin = UnitOfMeasure::linearUnitFactory('bin', 8);
        static::addUnit($bin);

        static::addMissingIECPrefixedUnits(
            $bin,
            1,
            '%Pbin',
            [
                '%pBin',
            ],
            1024
        );
    }
}
