<?php
namespace PhpUnitsOfMeasure\PhysicalQuantity;

use PhpUnitsOfMeasure\AbstractPhysicalQuantity;
use PhpUnitsOfMeasure\UnitOfMeasure;
use PhpUnitsOfMeasure\HasSIUnitsTrait;

class Force extends AbstractPhysicalQuantity
{
	use HasSIUnitsTrait;

	protected static $unitDefinitions;

	protected static function initialize()
	{

		// newton
		$newton = UnitOfMeasure::nativeUnitFactory('N');
		$newton->addAlias('newton');
		static::addUnit($newton);

		static::addMissingSIPrefixedUnits(
			$newton,
			1,
			'%pN',
			[
				'%Pnewton',
				'%Pnewtons'
			]
		);

		// kilonewton
		$newUnit = UnitOfMeasure::linearUnitFactory('kN', 1000);
		$newUnit->addAlias('kilonewton');
		static::addUnit($newUnit);

		// kip
		$newUnit = UnitOfMeasure::linearUnitFactory('kips', 4.4482216);
		$newUnit->addAlias('kip');
		static::addUnit($newUnit);
	}
}
