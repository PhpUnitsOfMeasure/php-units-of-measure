<?php
namespace PhpUnitsOfMeasure\Exception;

class UnknownUnitOfMeasure extends AbstractPhysicalQuantityException
{
    protected $error = 'Unknown unit of measure (:unit).';
}
