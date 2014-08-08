<?php
namespace PhpUnitsOfMeasure\PhysicalQuantity;

use PhpUnitsOfMeasure\PhysicalQuantity;
use PhpUnitsOfMeasure\UnitOfMeasure;

class Temperature extends PhysicalQuantity
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

        // Kelvin
        $newUnit = UnitOfMeasure::nativeUnitFactory('K');
        $newUnit->addAlias('°K');
        $newUnit->addAlias('kelvin');
        $this->registerUnitOfMeasure($newUnit);

        // Degree Celsius
        $newUnit = new UnitOfMeasure(
            '°C',
            function ($x) {
                return $x - 273.15;
            },
            function ($x) {
                return $x + 273.15;
            }
        );
        $newUnit->addAlias('C');
        $newUnit->addAlias('celsius');
        $this->registerUnitOfMeasure($newUnit);

        // Degree Fahrenheit
        $newUnit = new UnitOfMeasure(
            '°F',
            function ($x) {
                return ($x * 9 / 5) - 459.67;
            },
            function ($x) {
                return ($x + 459.67) * 5/9;
            }
        );
        $newUnit->addAlias('F');
        $newUnit->addAlias('fahrenheit');
        $this->registerUnitOfMeasure($newUnit);

        // Degree Rankine
        $newUnit = new UnitOfMeasure(
            '°R',
            function ($x) {
                return $x * 9/5;
            },
            function ($x) {
                return $x * 5/9;
            }
        );
        $newUnit->addAlias('R');
        $newUnit->addAlias('rankine');
        $this->registerUnitOfMeasure($newUnit);

        // Degree Delisle
        $newUnit = new UnitOfMeasure(
            '°De',
            function ($x) {
                return (373.15 - $x) * 3/2;
            },
            function ($x) {
                return 373.15 - $x * 2/3;
            }
        );
        $newUnit->addAlias('De');
        $newUnit->addAlias('delisle');
        $this->registerUnitOfMeasure($newUnit);

        // Degree Newton
        $newUnit = new UnitOfMeasure(
            '°N',
            function ($x) {
                return ($x - 273.15) * 33/100;
            },
            function ($x) {
                return $x * 100/33 + 273.15;
            }
        );
        $newUnit->addAlias('N');
        $newUnit->addAlias('newton');
        $this->registerUnitOfMeasure($newUnit);

        // Degree Réaumur
        $newUnit = new UnitOfMeasure(
            '°Ré',
            function ($x) {
                return ($x - 273.15) * 4/5;
            },
            function ($x) {
                return $x * 5/4 + 273.15;
            }
        );
        $newUnit->addAlias('°Re');
        $newUnit->addAlias('Ré');
        $newUnit->addAlias('Re');
        $newUnit->addAlias('réaumur');
        $newUnit->addAlias('reaumur');
        $this->registerUnitOfMeasure($newUnit);

        // Degree Rømer
        $newUnit = new UnitOfMeasure(
            '°Rø',
            function ($x) {
                return ($x - 273.15) * 21/40 + 7.5;
            },
            function ($x) {
                return ($x - 7.5) * 40/21 + 273.15;
            }
        );
        $newUnit->addAlias('°Ro');
        $newUnit->addAlias('Rø');
        $newUnit->addAlias('Ro');
        $newUnit->addAlias('rømer');
        $newUnit->addAlias('romer');
        $this->registerUnitOfMeasure($newUnit);
    }
}
