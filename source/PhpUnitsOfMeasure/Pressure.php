<?php
namespace PhpUnitsOfMeasure;

class Pressure extends Measurement
{
    /**
     * @see \PhpUnitsOfMeasure\Measurement::getNativeUnitOfMeasure()
     */
    protected function getNativeUnitOfMeasure()
    {
        return 'Pa';
    }

    /**
     * @see \PhpUnitsOfMeasure\Measurement::getUnitDefinitions()
     */
    protected function getUnitDefinitions()
    {
        return array(
            'atm' => array(
                'aliases'          => array('atmosphere', 'atmospheres'),
                'to_native_unit'   => function ($x) { return $x * 101325; },
                'from_native_unit' => function ($x) { return $x / 101325; },
            ),
            'bar' => array(
                'aliases'          => array('bar'),
                'to_native_unit'   => function ($x) { return $x * 1e5; },
                'from_native_unit' => function ($x) { return $x / 1e5; },
            ),
            'inHg' => array(
                'aliases'          => array('inches of mercury'),
                'to_native_unit'   => function ($x) { return $x * 3.386389e3; },
                'from_native_unit' => function ($x) { return $x / 3.386389e3; },
            ),
            'mmHg' => array(
                'aliases'          => array('milimeters of mercury', 'torr'),
                'to_native_unit'   => function ($x) { return $x * 133.3224; },
                'from_native_unit' => function ($x) { return $x / 133.3224; },
            ),
            'Pa' => array(
                'aliases'          => array('pascal'),
                'to_native_unit'   => function ($x) { return $x; },
                'from_native_unit' => function ($x) { return $x; },
            ),
            'psi' => array(
                'aliases'          => array('pounds per square inch'),
                'to_native_unit'   => function ($x) { return $x * 6.894757e3; },
                'from_native_unit' => function ($x) { return $x / 6.894757e3; },
            ),
        );
    }
}
