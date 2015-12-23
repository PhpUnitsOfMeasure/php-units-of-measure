<?php
namespace PhpUnitsOfMeasure\PhysicalQuantity;

use PhpUnitsOfMeasure\AbstractPhysicalQuantity;
use PhpUnitsOfMeasure\UnitOfMeasure;
use PhpUnitsOfMeasure\HasSIUnitsTrait;

class Quantity extends AbstractPhysicalQuantity
{
    use HasSIUnitsTrait;

    protected static $unitDefinitions;

    protected static function initialize()
    {
        // Moles
        $mole = UnitOfMeasure::nativeUnitFactory('mol');
        $mole->addAlias('mole');
        $mole->addAlias('moles');
        static::addUnit($mole);

        static::addMissingSIPrefixedUnits(
            $mole,
            1,
            '%pmol',
            [
                '%Pmole',
                '%Pmoles',
            ]
        );
    }
}
