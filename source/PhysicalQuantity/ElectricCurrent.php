<?php
namespace PhpUnitsOfMeasure\PhysicalQuantity;

use PhpUnitsOfMeasure\PhysicalQuantity;
use PhpUnitsOfMeasure\UnitOfMeasure;

class ElectricCurrent extends PhysicalQuantity
{
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
<<<<<<< HEAD:source/PhpUnitsOfMeasure/PhysicalQuantity/ElectricCurrent.php
        $newUnit = new UnitOfMeasure(
            'A',
            function ($x) {
                return $x;
            },
            function ($x) {
                return $x;
            },
            array(
                'amp',
                'amps',
                'ampre',
                'ampres'
            )
        );
        $this->registerUnitOfMeasure($newUnit);

        // Milliampere
        $newUnit = new UnitOfMeasure(
            'mA',
            function ($x) {
                return $x / 0.001;
            },
            function ($x) {
                return $x * 0.001;
            },
            array(
                'milliampere',
                'milliamperes',
                'milliamp',
                'milliamps'
            )
        );

        // Kiloampere
        $newUnit = new UnitOfMeasure(
            'kA',
            function ($x) {
                return $x / 1000;
            },
            function ($x) {
                return $x * 1000;
            },
            array(
                'kiloampere',
                'kiloamperes',
                'kiloamp',
                'kiloamps'
            )
        );
=======
        $newUnit = UnitOfMeasure::nativeUnitFactory('A');
        $newUnit->addAlias('amp');
        $newUnit->addAlias('amps');
        $newUnit->addAlias('ampere');
        $newUnit->addAlias('amperes');
>>>>>>> Github_Main/master:source/PhysicalQuantity/ElectricCurrent.php
        $this->registerUnitOfMeasure($newUnit);
    }
}
