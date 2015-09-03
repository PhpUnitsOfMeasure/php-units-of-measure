<?php
namespace PhpUnitsOfMeasure;

class NativeUnitOfMeasure extends UnitOfMeasure
{
    /**
     * Configure this object's mandatory properties.
     *
     * @param string   $name           This unit of measure's canonical name
     *
     * @throws Exception\NonStringUnitName
     */
    public function __construct($name)
    {
        parent::__construct(
            $name,
            function ($valueInNativeUnit) {
                return $valueInNativeUnit;
            },
            function ($valueInThisUnit) {
                return $valueInThisUnit;
            }
        );
    }
}
