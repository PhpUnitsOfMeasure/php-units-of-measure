<?php
namespace PhpUnitsOfMeasure;

class Temperature extends Measurement
{
    /**
     * @see \PhpUnitsOfMeasure\Measurement::getNativeUnitOfMeasure()
     */
    protected function getNativeUnitOfMeasure()
    {
        return '°K';
    }

    /**
     * @see \PhpUnitsOfMeasure\Measurement::getUnitDefinitions()
     */
    protected function getUnitDefinitions()
    {
        return array(
            '°C' => array(
                'aliases'          => array('C', 'celsius'),
                'to_native_unit'   => function ($x) { return $x + 273.15; },
                'from_native_unit' => function ($x) { return $x - 273.15; },
            ),

            '°F' => array(
                'aliases'          => array('F', 'fahrenheit'),
                'to_native_unit'   => function ($x) { return ($x + 459.67) * 5 / 9; },
                'from_native_unit' => function ($x) { return ($x * 9 / 5) - 459.67; },
            ),

            '°K' => array(
                'aliases'          => array('K', 'kelvin'),
                'to_native_unit'   => function ($x) { return $x; },
                'from_native_unit' => function ($x) { return $x; },
            ),
        );
    }
}
