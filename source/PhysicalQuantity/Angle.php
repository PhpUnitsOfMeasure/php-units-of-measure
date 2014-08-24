<?php
namespace PhpUnitsOfMeasure\PhysicalQuantity;

use PhpUnitsOfMeasure\PhysicalQuantity;
use PhpUnitsOfMeasure\UnitOfMeasure;
use PhpUnitsOfMeasure\HasSIUnitsTrait;

class Angle extends PhysicalQuantity
{
    use HasSIUnitsTrait;

    /**
     * Configure all the standard units of measure
     * to which this quantity can be converted.
     *
     * @return void
     */
    public function __construct($value, $unit)
    {
        parent::__construct($value, $unit);

        // Radians
        $radian = UnitOfMeasure::nativeUnitFactory('rad');
        $radian->addAlias('radian');
        $radian->addAlias('radians');
        $this->registerUnitOfMeasure($radian);

        $this->addMissingSIPrefixedUnits(
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
        $this->registerUnitOfMeasure($degree);

        $this->addMissingSIPrefixedUnits(
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
        $this->registerUnitOfMeasure($arcminute);

        // Arcsecond
        $arcsecond = UnitOfMeasure::linearUnitFactory('arcsec', M_PI / 180 / 3600);
        $arcsecond->addAlias('″');
        $arcminute->addAlias('arcsecond');
        $arcminute->addAlias('arcseconds');
        $arcsecond->addAlias('asec');
        $arcsecond->addAlias('as');
        $this->registerUnitOfMeasure($arcsecond);

        $this->addMissingSIPrefixedUnits(
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
