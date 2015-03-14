<?php
namespace PhpUnitsOfMeasure\Exception;

class NonNumericValue extends AbstractPhysicalQuantityException
{
    protected $error = 'Value (:value) must be numeric.';
}
