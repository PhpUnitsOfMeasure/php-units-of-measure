<?php
namespace PhpUnitsOfMeasure\PhysicalQuantity;

use \PhpUnitsOfMeasure\PhysicalQuantity;
use \PhpUnitsOfMeasure\UnitOfMeasure;

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
        $new_unit = new UnitOfMeasure(
            'K',
            function ($x) {
                return $x;
            },
            function ($x) {
                return $x;
            }
        );
        $new_unit->addAlias('°K');
        $new_unit->addAlias('kelvin');
        $this->registerUnitOfMeasure($new_unit);

        // Degree Celsius
        $new_unit = new UnitOfMeasure(
            '°C',
            function ($x) {
                return $x - 273.15;
            },
            function ($x) {
                return $x + 273.15;
            }
        );
        $new_unit->addAlias('C');
        $new_unit->addAlias('celsius');
        $this->registerUnitOfMeasure($new_unit);

        // Degree Fahrenheit
        $new_unit = new UnitOfMeasure(
            '°F',
            function ($x) {
                return ($x * 9 / 5) - 459.67;
            },
            function ($x) {
                return ($x + 459.67) * 5 / 9;
            }
        );
        $new_unit->addAlias('F');
        $new_unit->addAlias('fahrenheit');
        $this->registerUnitOfMeasure($new_unit);
		
		// Degree Rankine
        $new_unit = new UnitOfMeasure(
            '°R',
            function ($x) {
                return $x * 9 / 5;
            },
            function ($x) {
                return $x * 5 / 9;
            }
        );
        $new_unit->addAlias('R');
        $new_unit->addAlias('rankine');
        $this->registerUnitOfMeasure($new_unit);
		
		// Degree Delisle
        $new_unit = new UnitOfMeasure(
            '°De',
            function ($x) {
                return (373.15 - $x) * 3/2;
            },
            function ($x) {
                return 373.15 - $x * 2/3;
            }
        );
        $new_unit->addAlias('De');
        $new_unit->addAlias('delisle');
        $this->registerUnitOfMeasure($new_unit);
		
		// Degree Newton
        $new_unit = new UnitOfMeasure(
            '°N',
            function ($x) {
                return ($x - 273.15) * 33/100;
            },
            function ($x) {
                return $x * 100/33 + 273.15;
            }
        );
        $new_unit->addAlias('N');
        $new_unit->addAlias('newton');
        $this->registerUnitOfMeasure($new_unit);
		
		// Degree Réaumur
        $new_unit = new UnitOfMeasure(
            '°Ré',
            function ($x) {
                return ($x - 273.15) * 4/5;
            },
            function ($x) {
                return $x * 5/4 + 273.15;
            }
        );
		$new_unit->addAlias('°Re');
        $new_unit->addAlias('Ré');
		$new_unit->addAlias('Re');
        $new_unit->addAlias('réaumur');
		$new_unit->addAlias('reaumur');
        $this->registerUnitOfMeasure($new_unit);
		
		// Degree Rømer
        $new_unit = new UnitOfMeasure(
            '°Rø',
            function ($x) {
                return ($x - 273.15) * 21/40 + 7.5;
            },
            function ($x) {
                return ($x - 7.5) * 40/21 + 273.15;
            }
        );
		$new_unit->addAlias('°Ro');
        $new_unit->addAlias('Rø');
		$new_unit->addAlias('Ro');
        $new_unit->addAlias('rømer');
		$new_unit->addAlias('romer');
        $this->registerUnitOfMeasure($new_unit);
    }
}
