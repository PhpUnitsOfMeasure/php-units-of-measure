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

        /*
        // kilobyte (KB)
        $unit = UnitOfMeasure::linearUnitFactory('kilobyte', 1024);
        $unit->addAlias('KB');
        static::addUnit($unit);

        // megabyte (MB)
        $unit = UnitOfMeasure::linearUnitFactory('megabyte', 1048576);
        $unit->addAlias('MB');
        static::addUnit($unit);

        // gigabyte (GB)
        $unit = UnitOfMeasure::linearUnitFactory('gigabyte', 1073741824);
        $unit->addAlias('GB');
        static::addUnit($unit);

        // terabyte (TB)
        $unit = UnitOfMeasure::linearUnitFactory('terabyte', 1099511627776);
        $unit->addAlias('TB');
        static::addUnit($unit);

        // petabyte (PB)
        $unit = UnitOfMeasure::linearUnitFactory('petabyte', 1125899906842624);
        $unit->addAlias('PB');
        static::addUnit($unit);
        */
    }
}
