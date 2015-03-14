<?php
namespace PhpUnitsOfMeasure\PhysicalQuantity;

use PhpUnitsOfMeasure\AbstractPhysicalQuantity;
use PhpUnitsOfMeasure\UnitOfMeasure;
use PhpUnitsOfMeasure\HasSIUnitsTrait;

class Temperature extends AbstractPhysicalQuantity
{
    use HasSIUnitsTrait;

    protected static $unitDefinitions;

    protected static function initialize()
    {
        // Kelvin
        $kelvin = UnitOfMeasure::nativeUnitFactory('K');
        $kelvin->addAlias('°K');
        $kelvin->addAlias('kelvin');
        static::addUnit($kelvin);

        static::addMissingSIPrefixedUnits(
            $kelvin,
            1,
            '%pK',
            [
                '%Pkelvin',
            ]
        );

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
        static::addUnit($newUnit);

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
        static::addUnit($newUnit);

        // Degree Rankine
        $newUnit = UnitOfMeasure::linearUnitFactory('°R', 5/9);
        $newUnit->addAlias('R');
        $newUnit->addAlias('rankine');
        static::addUnit($newUnit);

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
        static::addUnit($newUnit);

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
        static::addUnit($newUnit);

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
        static::addUnit($newUnit);

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
        static::addUnit($newUnit);
    }
}
