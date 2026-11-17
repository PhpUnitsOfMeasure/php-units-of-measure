<?php
namespace PhpUnitsOfMeasure\PhysicalQuantity;

use PhpUnitsOfMeasure\AbstractPhysicalQuantity;
use PhpUnitsOfMeasure\UnitOfMeasure;
use PhpUnitsOfMeasure\HasSIUnitsTrait;

class Mass extends AbstractPhysicalQuantity
{
    use HasSIUnitsTrait;

    protected static $unitDefinitions;

    protected static function initialize()
    {
        // Kilogram
        $kilogram = UnitOfMeasure::nativeUnitFactory('kg');
        $kilogram->addAlias('kilogram');
        $kilogram->addAlias('kilograms');
        static::addUnit($kilogram);

        static::addMissingSIPrefixedUnits(
            $kilogram,
            1e-3,
            '%pg',
            [
                '%Pgram',
                '%Pgrams',
            ]
        );

        // Tonne (metric)
        $tonne = UnitOfMeasure::linearUnitFactory('t', 1e3);
        $tonne->addAlias('T');
        $tonne->addAlias('ton');
        $tonne->addAlias('tons');
        $tonne->addAlias('tonne');
        $tonne->addAlias('tonnes');
        static::addUnit($tonne);

        static::addMissingSIPrefixedUnits(
            $tonne,
            1,
            '%pt',
            [
                '%pT',
                '%Pton',
                '%Ptons',
                '%Ptonne',
                '%Ptonnes',
            ]
        );

        // Grain
        $newUnit = UnitOfMeasure::linearUnitFactory('gr', 0.45359237 / (16 * 437.5));
        $newUnit->addAlias('grain');
        $newUnit->addAlias('grains');
        static::addUnit($newUnit);

        // Pound
        $newUnit = UnitOfMeasure::linearUnitFactory('lb', 0.45359237);
        $newUnit->addAlias('lbs');
        $newUnit->addAlias('pound');
        $newUnit->addAlias('pounds');
        static::addUnit($newUnit);

        // Ounce
        $newUnit = UnitOfMeasure::linearUnitFactory('oz', 0.45359237 / 16);
        $newUnit->addAlias('ounce');
        $newUnit->addAlias('ounces');
        static::addUnit($newUnit);

        // Stone
        $newUnit = UnitOfMeasure::linearUnitFactory('st', 0.45359237 * 14);
        $newUnit->addAlias('stone');
        $newUnit->addAlias('stones');
        static::addUnit($newUnit);

        // Hundredweight
        $newUnit = UnitOfMeasure::linearUnitFactory('cwt', 0.45359237 * 112);
        $newUnit->addAlias('hundredweight');
        $newUnit->addAlias('hundredweights');
        static::addUnit($newUnit);

        // US short Ton
        $newUnit = UnitOfMeasure::linearUnitFactory('ust', 0.45359237 * 2000);
        $newUnit->addAlias('us short ton');
        $newUnit->addAlias('us short tons');
        static::addUnit($newUnit);

        // US long Ton
        $newUnit = UnitOfMeasure::linearUnitFactory('ukt', 0.45359237 * 2240);
        $newUnit->addAlias('uk long ton');
        $newUnit->addAlias('uk long tons');
        static::addUnit($newUnit);

        // Asian picul
        $newUnit = UnitOfMeasure::linearUnitFactory('picul', 60.478982);
        $newUnit->addAlias('tam');
        static::addUnit($newUnit);
    }
}
