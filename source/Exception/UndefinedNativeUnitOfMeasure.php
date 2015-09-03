<?php
namespace PhpUnitsOfMeasure\Exception;

class UndefinedNativeUnitOfMeasure extends AbstractPhysicalQuantityException
{
    protected $error = 'Undefined native unit of measure for physical quantity :qty.';
}
