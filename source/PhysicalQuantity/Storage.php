<?php

namespace PhpUnitsOfMeasure\PhysicalQuantity;

use PhpUnitsOfMeasure\AbstractPhysicalQuantity;
use PhpUnitsOfMeasure\UnitOfMeasure;
use PhpUnitsOfMeasure\HasIECUnitsTrait;

class Storage extends AbstractPhysicalQuantity
{
    use HasIECUnitsTrait;

    protected static $unitDefinitions;

    protected static function initialize()
    {
        // Bit
        $bit = UnitOfMeasure::nativeUnitFactory('bit');
        $bit->addAlias('b');
        static::addUnit($bit);

        static::addMissingIECPrefixedUnits(
            $bit,
            1,
            '%Pbit',
            [
                '%pb',
                '%Pbits',
            ]
        );

        // Byte
        $byte = UnitOfMeasure::linearUnitFactory('byte', 8);
        $byte->addAlias('B');
        static::addUnit($byte);

        static::addMissingIECPrefixedUnits(
            $byte,
            1,
            '%Pbyte',
            [
                '%Pbytes',
                '%pB',
                '%pByte',
                '%pBytes',
            ],
            1024
        );
    }
}
