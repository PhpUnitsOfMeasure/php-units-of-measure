<?php
namespace PhpUnitsOfMeasure\PhysicalQuantity;

use \PhpUnitsOfMeasure\PhysicalQuantity;
use \PhpUnitsOfMeasure\UnitOfMeasure;

class Area extends PhysicalQuantity
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

        // Meters squared
        $newUnit = new UnitOfMeasure(
            'm^2',
            function ($x) {
                return $x;
            },
            function ($x) {
                return $x;
            },
            array(
                'm²',
                'meter squared',
                'meters squared',
                'metre squared',
                'metres squared'
            )
        );
        $this->registerUnitOfMeasure($newUnit);

        // Millimeter squared
        $newUnit = new UnitOfMeasure(
            'mm^2',
            function ($x) {
                return $x / 1e-6;
            },
            function ($x) {
                return $x * 1e-6;
            },
            array(
                'mm²',
                'millimeter squared',
                'millimeters squared',
                'millimetre squared',
                'millimetres squared'
            )
        );
        $this->registerUnitOfMeasure($newUnit);

        // Centimeter squared
        $newUnit = new UnitOfMeasure(
            'cm^2',
            function ($x) {
                return $x / 1e-4;
            },
            function ($x) {
                return $x * 1e-4;
            },
            array(
                'cm²',
                'centimeter squared',
                'centimeters squared',
                'centimetre squared',
                'centimetres squared'
            )
        );
        $this->registerUnitOfMeasure($newUnit);

        // Decimeter squared
        $newUnit = new UnitOfMeasure(
            'dm^2',
            function ($x) {
                return $x / 1e-2;
            },
            function ($x) {
                return $x * 1e-2;
            },
            array(
                'dm²',
                'decimeter squared',
                'decimeters squared',
                'decimetre squared',
                'decimetres squared'
            )
        );
        $this->registerUnitOfMeasure($newUnit);

        // Kilometer squared
        $newUnit = new UnitOfMeasure(
            'km^2',
            function ($x) {
                return $x / 1e6;
            },
            function ($x) {
                return $x * 1e6;
            },
            array(
                'km²',
                'kilometer squared',
                'kilometers squared',
                'kilometre squared',
                'kilometres squared'
            )
        );
        $this->registerUnitOfMeasure($newUnit);

        // Foot squared
        $newUnit = new UnitOfMeasure(
            'ft^2',
            function ($x) {
                return $x / 9.290304e-2;
            },
            function ($x) {
                return $x * 9.290304e-2;
            },
            array(
                'ft²',
                'foot squared',
                'feet squared'
            )
        );
        $this->registerUnitOfMeasure($newUnit);

        // Inch squared
        $newUnit = new UnitOfMeasure(
            'in^2',
            function ($x) {
                return $x / 6.4516e-4;
            },
            function ($x) {
                return $x * 6.4516e-4;
            },
            array(
                'in²',
                'inch squared',
                'inches squared'
            )
        );
        $this->registerUnitOfMeasure($newUnit);

        // Mile squared
        $newUnit = new UnitOfMeasure(
            'mi^2',
            function ($x) {
                return $x / 2.589988e6;
            },
            function ($x) {
                return $x * 2.589988e6;
            },
            array(
                'mi²',
                'mile squared',
                'miles squared'
            )
        );
        $this->registerUnitOfMeasure($newUnit);

        // Yard squared
        $newUnit = new UnitOfMeasure(
            'yd^2',
            function ($x) {
                return $x / 8.361274e-1;
            },
            function ($x) {
                return $x * 8.361274e-1;
            },
            array(
                'yd²',
                'yard squared',
                'yards squared'
            )
        );
        $this->registerUnitOfMeasure($newUnit);


        $newUnit = new UnitOfMeasure(
            'ha',
            function ($x) {
                return $x / 10000;
            },
            function ($x) {
                return $x * 10000;
            },
            array(
                'hectare',
                'hectares'
            )
        );
        $this->registerUnitOfMeasure($newUnit);


        // International Acre
        $newUnit = new UnitOfMeasure(
            'ac',
            function ($x) {
                return $x / 4046.8564224;
            },
            function ($x) {
                return $x * 4046.8564224;
            },
            array(
                'acre',
                'acres'
            )
        );
        $this->registerUnitOfMeasure($newUnit);
    }
}
