<?php
namespace PhpUnitsOfMeasure\PhysicalQuantity;

use PhpUnitsOfMeasure\PhysicalQuantity;
use PhpUnitsOfMeasure\UnitOfMeasure;
use PhpUnitsOfMeasure\HasSIUnitsTrait;

class ElectricCurrent extends PhysicalQuantity
{
    use HasSIUnitsTrait;

    /**
     * Configure all the standard units of measure
     * to which this quantity can be converted.
     *
     * @return void
     */
    public function __construct($value, $unit)
    {
        parent::__construct($value, $unit);

        // Ampere
        $ampere = UnitOfMeasure::nativeUnitFactory('A');
        $ampere->addAlias('amp');
        $ampere->addAlias('amps');
        $ampere->addAlias('ampere');
        $ampere->addAlias('amperes');
        $this->registerUnitOfMeasure($ampere);

        $this->addMissingSIPrefixedUnits(
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
