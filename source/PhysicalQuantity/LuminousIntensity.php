<?php
namespace PhpUnitsOfMeasure\PhysicalQuantity;

use PhpUnitsOfMeasure\PhysicalQuantity;
use PhpUnitsOfMeasure\UnitOfMeasure;
use PhpUnitsOfMeasure\HasSIUnitsTrait;

class LuminousIntensity extends PhysicalQuantity
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

        // Candela
        $candela = UnitOfMeasure::nativeUnitFactory('cd');
        $candela->addAlias('candela');
        $this->registerUnitOfMeasure($candela);

        $this->addMissingSIPrefixedUnits(
            $candela,
            1,
            '%pcd',
            [
                '%Pcandela',
            ]
        );
    }
}
