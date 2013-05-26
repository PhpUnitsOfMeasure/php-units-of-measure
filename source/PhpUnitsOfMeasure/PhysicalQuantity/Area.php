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
        $new_unit = new UnitOfMeasure(
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
                'meters squared'
            )
        );
        $this->registerUnitOfMeasure($new_unit);

        // Millimeter squared
        $new_unit = new UnitOfMeasure(
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
                'millimeters squared'
            )
        );
        $this->registerUnitOfMeasure($new_unit);

        // Centimeter squared
        $new_unit = new UnitOfMeasure(
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
                'centimeters squared'
            )
        );
        $this->registerUnitOfMeasure($new_unit);

        // Decimeter squared
        $new_unit = new UnitOfMeasure(
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
                'decimeters squared'
            )
        );
        $this->registerUnitOfMeasure($new_unit);

        // Kilometer squared
        $new_unit = new UnitOfMeasure(
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
                'kilometers squared'
            )
        );
        $this->registerUnitOfMeasure($new_unit);

        // Foot squared
        $new_unit = new UnitOfMeasure(
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
        $this->registerUnitOfMeasure($new_unit);

        // Inch squared
        $new_unit = new UnitOfMeasure(
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
        $this->registerUnitOfMeasure($new_unit);

        // Mile squared
        $new_unit = new UnitOfMeasure(
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
        $new_unit->addAlias('mi²');
        $new_unit->addAlias('mile squared');
        $new_unit->addAlias('miles squared');
        $this->registerUnitOfMeasure($new_unit);

        // Yard squared
        $new_unit = new UnitOfMeasure(
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
        $new_unit->addAlias('yd²');
        $new_unit->addAlias('yard squared');
        $new_unit->addAlias('yards squared');
        $this->registerUnitOfMeasure($new_unit);
    }
}
