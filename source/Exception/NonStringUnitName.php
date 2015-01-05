<?php
namespace PhpUnitsOfMeasure\Exception;

class NonStringUnitName extends AbstractPhysicalQuantityException
{
    protected $error = 'Unit name or alias (:name) must be a string value.';
}
