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

        // Degree Kelvin
        $new_unit = new UnitOfMeasure(
            '°K',
            function ($x) {
                return $x;
            },
            function ($x) {
                return $x;
            }
        );
        $new_unit->addAlias('K');
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
    }
}
