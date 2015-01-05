<?php
namespace PhpUnitsOfMeasure\Exception;

class DuplicateUnitNameOrAlias extends AbstractPhysicalQuantityException
{
    protected $error = 'The unit has a name or alias (:labels) which is already a registered unit for this quantity.';
}
