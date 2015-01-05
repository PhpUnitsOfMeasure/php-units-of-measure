<?php
namespace PhpUnitsOfMeasure\PhysicalQuantity;

use PhpUnitsOfMeasure\AbstractPhysicalQuantity;
use PhpUnitsOfMeasure\UnitOfMeasure;
use PhpUnitsOfMeasure\HasSIUnitsTrait;

class ElectricCurrent extends AbstractPhysicalQuantity
{
    use HasSIUnitsTrait;

    protected static $unitDefinitions;

    protected static function initialize()
    {
        // Ampere
        $ampere = UnitOfMeasure::nativeUnitFactory('A');
        $ampere->addAlias('amp');
        $ampere->addAlias('amps');
        $ampere->addAlias('ampere');
        $ampere->addAlias('amperes');
        static::addUnit($ampere);

        static::addMissingSIPrefixedUnits(
            $ampere,
            1,
            '%pA',
            [
                '%Pamp',
                '%Pamps',
                '%Pampere',
                '%Pamperes'
            ]
        );
    }
}
