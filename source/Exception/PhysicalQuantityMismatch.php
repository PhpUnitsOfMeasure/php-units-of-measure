<?php
namespace PhpUnitsOfMeasure\Exception;

class PhysicalQuantityMismatch extends AbstractPhysicalQuantityException
{
    protected $error = '(:lhs) and (:rhs) cannot be added or subtracted because they are not the same physical quantity.';
}
