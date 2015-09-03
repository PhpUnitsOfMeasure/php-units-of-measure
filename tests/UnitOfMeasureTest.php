<?php

namespace PhpUnitsOfMeasureTest;

use PhpUnitsOfMeasure\NativeUnitOfMeasure;
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
     * @covers \PhpUnitsOfMeasure\UnitOfMeasure::__construct
     * @expectedException \PhpUnitsOfMeasure\Exception\NonStringUnitName
     */
    public function testConstructWithNonStringName()
    {
        $uom = new UnitOfMeasure(
            42,
            function ($valueInNativeUnit) {
                return $valueInNativeUnit;
            },
            function ($valueInThisUnit) {
                return $valueInThisUnit;
            }
        );
    }

    /**
     * @covers \PhpUnitsOfMeasure\UnitOfMeasure::addAlias
     * @covers \PhpUnitsOfMeasure\UnitOfMeasure::getAliases
     */
    public function testGetAliases()
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
        $uom->addAlias('schmoos');

        $this->assertEquals(
            ['ooltauqs', 'schmoos'],
            $uom->getAliases()
        );
    }

    /**
     * @covers \PhpUnitsOfMeasure\UnitOfMeasure::addAlias
     * @expectedException \PhpUnitsOfMeasure\Exception\NonStringUnitName
     */
    public function testAddAliasWithNonStringAlias()
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

        $uom->addAlias(42);
    }

    /**
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
     * @covers \PhpUnitsOfMeasure\UnitOfMeasure::isAliasOf
     * @expectedException \PhpUnitsOfMeasure\Exception\NonStringUnitName
     */
    public function testIsAliasOfWithNonStringAlias()
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

        $this->assertFalse($uom->isAliasOf(42));
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
     * @covers \PhpUnitsOfMeasure\UnitOfMeasure::convertValueFromNativeUnitOfMeasure
     * @expectedException \PhpUnitsOfMeasure\Exception\NonNumericValue
     */
    public function testConvertValueFromNativeUnitOfMeasureWithNonNumericalValue()
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

        $this->assertSame(11.234, $uom->convertValueFromNativeUnitOfMeasure('string'));
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

    /**
     * @covers \PhpUnitsOfMeasure\UnitOfMeasure::convertValueToNativeUnitOfMeasure
     * @expectedException \PhpUnitsOfMeasure\Exception\NonNumericValue
     */
    public function testConvertValueToNativeUnitOfMeasureWithNonNumericalValue()
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

        $this->assertSame(11.234, $uom->convertValueToNativeUnitOfMeasure('string'));
    }

    /**
     * @covers \PhpUnitsOfMeasure\UnitOfMeasure::__toString
     */
    public function testToString()
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

        $this->assertSame('quatloos', (string) $uom);
    }

    /**
     * @covers \PhpUnitsOfMeasure\UnitOfMeasure::isNativeUnit
     */
    public function testIsNativeUnit()
    {
        $uom = new NativeUnitOfMeasure(
            'quatloos'
        );

        $this->assertSame(true, $uom->isNativeUnit());
    }

    /**
     * @covers \PhpUnitsOfMeasure\UnitOfMeasure::isNativeUnit
     */
    public function testIsNotNativeUnit()
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

        $this->assertSame(false, $uom->isNativeUnit());
    }
}
