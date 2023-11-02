<?php

namespace PhpUnitsOfMeasureTest;

use PHPUnit\Framework\TestCase;
use PhpUnitsOfMeasure\UnitOfMeasure;

class UnitOfMeasureTest extends TestCase
{
    /**
     * @covers \PhpUnitsOfMeasure\UnitOfMeasure::__construct
     * @covers \PhpUnitsOfMeasure\UnitOfMeasure::getName
     */
    public function testGetName(): void
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
     */
    public function testConstructWithNonStringName(): void
    {
        $this->expectException(\PhpUnitsOfMeasure\Exception\NonStringUnitName::class);
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
    public function testGetAliases(): void
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
     */
    public function testAddAliasWithNonStringAlias(): void
    {
        $this->expectException(\PhpUnitsOfMeasure\Exception\NonStringUnitName::class);
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
    public function testIsAliasOf(): void
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
    public function testIsNotAliasOf(): void
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
     *
     */
    public function testIsAliasOfWithNonStringAlias(): void
    {
        $this->expectException(\PhpUnitsOfMeasure\Exception\NonStringUnitName::class);
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
    public function testConvertValueFromNativeUnitOfMeasure(): void
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
     */
    public function testConvertValueFromNativeUnitOfMeasureWithNonNumericalValue(): void
    {
        $this->expectException(\PhpUnitsOfMeasure\Exception\NonNumericValue::class);
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
    public function testConvertValueToNativeUnitOfMeasure(): void
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
     */
    public function testConvertValueToNativeUnitOfMeasureWithNonNumericalValue(): void
    {
        $this->expectException(\PhpUnitsOfMeasure\Exception\NonNumericValue::class);
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
}
