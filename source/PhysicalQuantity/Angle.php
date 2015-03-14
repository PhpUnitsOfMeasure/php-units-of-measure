<?php
namespace PhpUnitsOfMeasure\PhysicalQuantity;

use PhpUnitsOfMeasure\AbstractPhysicalQuantity;
use PhpUnitsOfMeasure\UnitOfMeasure;
use PhpUnitsOfMeasure\HasSIUnitsTrait;

class Angle extends AbstractPhysicalQuantity
{
    use HasSIUnitsTrait;

    protected static $unitDefinitions;

    protected static function initialize()
    {
        // Radians
        $radian = UnitOfMeasure::nativeUnitFactory('rad');
        $radian->addAlias('radian');
        $radian->addAlias('radians');
        static::addUnit($radian);

        static::addMissingSIPrefixedUnits(
            $radian,
            1,
            '%prad',
            [
                '%Pradian',
                '%Pradians',
            ]
        );

        // Degrees
        $degree = UnitOfMeasure::linearUnitFactory('deg', M_PI / 180);
        $degree->addAlias('°');
        $degree->addAlias('degree');
        $degree->addAlias('degrees');
        static::addUnit($degree);

        static::addMissingSIPrefixedUnits(
            $degree,
            1,
            '%pdeg',
            [
                '%Pdegree',
                '%Pdegrees',
            ]
        );

        // Arcminute
        $arcminute = UnitOfMeasure::linearUnitFactory('arcmin', M_PI / 180 / 60);
        $arcminute->addAlias('′');
        $arcminute->addAlias('arcminute');
        $arcminute->addAlias('arcminutes');
        $arcminute->addAlias('amin');
        $arcminute->addAlias('am');
        $arcminute->addAlias('MOA');
        static::addUnit($arcminute);

        // Arcsecond
        $arcsecond = UnitOfMeasure::linearUnitFactory('arcsec', M_PI / 180 / 3600);
        $arcsecond->addAlias('″');
        $arcminute->addAlias('arcsecond');
        $arcminute->addAlias('arcseconds');
        $arcsecond->addAlias('asec');
        $arcsecond->addAlias('as');
        static::addUnit($arcsecond);

        static::addMissingSIPrefixedUnits(
            $arcsecond,
            1,
            '%Parcsec',
            [
                '%Parcsecond',
                '%Parcseconds',
                '%pasec',
                '%pas',
            ]
        );
    }
}
