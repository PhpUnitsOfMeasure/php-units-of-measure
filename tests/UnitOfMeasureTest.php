<?php

namespace PhpUnitsOfMeasureTest;

use PhpUnitsOfMeasure\UnitOfMeasure;

class UnitOfMeasureTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers \PhpUnitsOfMeasure\UnitOfMeasure::__construct
     * @covers \PhpUnitsOfMeasure\UnitOfMeasure::getName
     */
    public function testGetName()
    {
        $uom = new UnitOfMeasure(
            'quatloos',
            function ($valueInNativeUnit) {
                return $valueInNativeUnit;
            },
            function ($valueInThisUnit) {
                return $valueInThisUnit;
            }
        );

        $this->assertEquals('quatloos', $uom->getName());
    }

    /**
     * @covers \PhpUnitsOfMeasure\UnitOfMeasure::addAlias
     * @covers \PhpUnitsOfMeasure\UnitOfMeasure::isAliasOf
     */
    public function testIsAliasOf()
    {
        $uom = new UnitOfMeasure(
            'quatloos',
            function ($valueInNativeUnit) {
                return $valueInNativeUnit;
            },
            function ($valueInThisUnit) {
                return $valueInThisUnit;
            }
        );

        $uom->addAlias('ooltauqs');

        $this->assertTrue($uom->isAliasOf('ooltauqs'));
    }

    /**
     * @covers \PhpUnitsOfMeasure\UnitOfMeasure::addAlias
     * @covers \PhpUnitsOfMeasure\UnitOfMeasure::isAliasOf
     */
    public function testIsNotAliasOf()
    {
        $uom = new UnitOfMeasure(
            'quatloos',
            function ($valueInNativeUnit) {
                return $valueInNativeUnit;
            },
            function ($valueInThisUnit) {
                return $valueInThisUnit;
            }
        );

        $uom->addAlias('ooltauqs');

        $this->assertFalse($uom->isAliasOf('wampii'));
    }

    /**
     * @covers \PhpUnitsOfMeasure\UnitOfMeasure::convertValueFromNativeUnitOfMeasure
     */
    public function testConvertValueFromNativeUnitOfMeasure()
    {
        $uom = new UnitOfMeasure(
            'quatloos',
            function ($valueInNativeUnit) {
                return $valueInNativeUnit * 1.1234;
            },
            function ($valueInThisUnit) {
                return false;
            }
        );

        $this->assertSame(11.234, $uom->convertValueFromNativeUnitOfMeasure(10));
    }

    /**
     * @covers \PhpUnitsOfMeasure\UnitOfMeasure::convertValueToNativeUnitOfMeasure
     */
    public function testConvertValueToNativeUnitOfMeasure()
    {
        $uom = new UnitOfMeasure(
            'quatloos',
            function ($valueInNativeUnit) {
                return false;
            },
            function ($valueInThisUnit) {
                return $valueInThisUnit * 1.1234;
            }
        );

        $this->assertSame(11.234, $uom->convertValueToNativeUnitOfMeasure(10));
    }
}
