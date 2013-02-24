<?php
namespace PhpUnitsOfMeasure;

class Length extends Measurement
{
    /**
     * @see \PhpUnitsOfMeasure\Measurement::getNativeUnitOfMeasure()
     */
    protected function getNativeUnitOfMeasure()
    {
        return 'm';
    }

    /**
     * @see \PhpUnitsOfMeasure\Measurement::getUnitDefinitions()
     */
    protected function getUnitDefinitions()
    {
        return array(
            'ft' => array(
                'aliases'          => array('foot', 'feet'),
                'to_native_unit'   => function ($x) { return $x * 0.3048; },
                'from_native_unit' => function ($x) { return $x / 0.3048; },
            ),

            'in' => array(
                'aliases'          => array('inch', 'inches'),
                'to_native_unit'   => function ($x) { return $x * 0.0254; },
                'from_native_unit' => function ($x) { return $x / 0.0254; },
            ),

            'm' => array(
                'aliases'          => array('meter', 'meters'),
                'to_native_unit'   => function ($x) { return $x; },
                'from_native_unit' => function ($x) { return $x; },
            ),

            'mi' => array(
                'aliases'          => array('mile', 'miles'),
                'to_native_unit'   => function ($x) { return $x * 1609.344; },
                'from_native_unit' => function ($x) { return $x / 1609.344; },
            ),

            'yd' => array(
                'aliases'          => array('yard', 'yards'),
                'to_native_unit'   => function ($x) { return $x * 0.9144; },
                'from_native_unit' => function ($x) { return $x / 0.9144; },
            ),
        );
    }
}
