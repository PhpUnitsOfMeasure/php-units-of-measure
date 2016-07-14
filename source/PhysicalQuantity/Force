<?php
namespace PhpUnitsOfMeasure\PhysicalQuantity;

use PhpUnitsOfMeasure\AbstractPhysicalQuantity;
use PhpUnitsOfMeasure\UnitOfMeasure;

class Force extends AbstractPhysicalQuantity
{
	protected static $unitDefinitions;

	protected static function initialize()
	{
		// kilonewton
		$newUnit = UnitOfMeasure::nativeUnitFactory('kN');
		$newUnit->addAlias('kilonewton');
		static::addUnit($newUnit);

		// kip
		$newUnit = UnitOfMeasure::linearUnitFactory('kips', 4.4482216);
		$newUnit->addAlias('kip');
		static::addUnit($newUnit);
	}
}
