<?php
namespace PhpUnitsOfMeasure\PhysicalQuantity;

use PhpUnitsOfMeasure\AbstractPhysicalQuantity;
use PhpUnitsOfMeasure\UnitOfMeasure;
use PhpUnitsOfMeasure\HasSIUnitsTrait;

class LuminousIntensity extends AbstractPhysicalQuantity
{
    use HasSIUnitsTrait;

    protected static $unitDefinitions;

    protected static function initialize()
    {
        // Candela
        $candela = UnitOfMeasure::nativeUnitFactory('cd');
        $candela->addAlias('candela');
        static::addUnit($candela);

        static::addMissingSIPrefixedUnits(
            $candela,
            1,
            '%pcd',
            [
                '%Pcandela',
            ]
        );
    }
}
