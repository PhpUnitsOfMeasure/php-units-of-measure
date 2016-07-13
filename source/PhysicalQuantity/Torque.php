<?php
namespace PhpUnitsOfMeasure\PhysicalQuantity;

use PhpUnitsOfMeasure\AbstractPhysicalQuantity;
use PhpUnitsOfMeasure\UnitOfMeasure;

class Torque extends AbstractPhysicalQuantity
{
	protected static $unitDefinitions;

	protected static function initialize()
	{
		// newton per meter
		$newUnit = UnitOfMeasure::nativeUnitFactory('N/m');
		$newUnit->addAlias('newton/meter');
		$newUnit->addAlias('newton per meter');
		static::addUnit($newUnit);

		// pound-force per inch
		$newUnit = UnitOfMeasure::linearUnitFactory('lbf/in', 175.1268369864);
		$newUnit->addAlias('lbf/inch');
		$newUnit->addAlias('pound-force/inch');
		$newUnit->addAlias('pound-force per inch');
		static::addUnit($newUnit);

		// gram-force per centimeter
		$newUnit = UnitOfMeasure::linearUnitFactory('gf/cm', 0.9806649999788);
		$newUnit->addAlias('gram-force/centimeter');
		$newUnit->addAlias('gram-force per centimeter');
		static::addUnit($newUnit);
	}
}
