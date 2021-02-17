<?php

namespace PhpUnitsOfMeasure\PhysicalQuantity;

use PhpUnitsOfMeasure\AbstractPhysicalQuantity;
use PhpUnitsOfMeasure\UnitOfMeasure;

class Storage extends AbstractPhysicalQuantity
{

    protected static $unitDefinitions;

    protected static function initialize()
    {
        // Byte
        $unit = UnitOfMeasure::nativeUnitFactory('byte');
        $unit->addAlias('B');
        static::addUnit($unit);

        // Bit
        $unit = UnitOfMeasure::linearUnitFactory('bit', 0.125);
        $unit->addAlias('b');
        static::addUnit($unit);

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
    }
}
