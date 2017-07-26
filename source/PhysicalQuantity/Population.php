<?php
namespace PhpUnitsOfMeasure\PhysicalQuantity;

use PhpUnitsOfMeasure\AbstractPhysicalQuantity;
use PhpUnitsOfMeasure\UnitOfMeasure;
use PhpUnitsOfMeasure\HasSIUnitsTrait;

class Population extends AbstractPhysicalQuantity
{
    use HasSIUnitsTrait;

    protected static $unitDefinitions;

    protected static function initialize()
    {
        // Person
        $person = UnitOfMeasure::nativeUnitFactory('person');
        $person->addAlias('persons');
        static::addUnit($person);

        static::addMissingSIPrefixedUnits(
            $person,
            1,
            '%pperson',
            [
                '%ppersons',
                '%Pperson',
                '%Ppersons',
            ]
        );
    }
}
