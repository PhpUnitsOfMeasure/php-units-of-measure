<?php

namespace PhpUnitsOfMeasureTest;

use PHPUnit\Framework\TestCase;
use PhpUnitsOfMeasure\AbstractPhysicalQuantity;
use PhpUnitsOfMeasure\UnitOfMeasureInterface;
use PhpUnitsOfMeasure\Exception\PhysicalQuantityMismatch;
use PhpUnitsOfMeasureTest\Fixtures\PhysicalQuantity\Wonkicity;
use PhpUnitsOfMeasureTest\Fixtures\PhysicalQuantity\Woogosity;

/**
 * Because of the large amount of global state preserved in the static
 * properties of the various physical quantity classes, we'll run
 * each test in this file its own process.
 *
 * @runTestsInSeparateProcesses
 */
class AbstractPhysicalQuantityTest extends TestCase
{
    protected function getTestUnitOfMeasure($name, $aliases = [])
    {
        $newUnit = $this->getMockBuilder(UnitOfMeasureInterface::class)
            ->getMock();
        $newUnit->method('getName')
            ->willReturn($name);
        $newUnit->method('getAliases')
            ->willReturn($aliases);
        $newUnit->method('isAliasOf')
            ->will($this->returnCallback(
                function ($value) use ($aliases) {
                    return in_array($value, $aliases);
                }
            ));

        return $newUnit;
    }

    /**
     * @covers \PhpUnitsOfMeasure\AbstractPhysicalQuantity::addUnit
     */
    public function testAddUnit(): void
    {
        $newUnit = $this->getTestUnitOfMeasure('noconflict', ['definitelynoconflict']);

        Wonkicity::addUnit($newUnit);
    }

    /**
     * @dataProvider exceptionProducingUnitsProvider
     * @covers \PhpUnitsOfMeasure\AbstractPhysicalQuantity::addUnit
     */
    public function testAddUnitFailsOnNameCollision($unitName, $unitAliases): void
    {
        $this->expectException(\PhpUnitsOfMeasure\Exception\DuplicateUnitNameOrAlias::class);
        $newUnit = $this->getTestUnitOfMeasure($unitName, $unitAliases);

        Wonkicity::addUnit($newUnit);
    }

    /**
     * @covers \PhpUnitsOfMeasure\AbstractPhysicalQuantity::getUnit
     */
    public function testGetUnit(): void
    {
        $unit = Wonkicity::getUnit('u');

        $this->assertSame('u', $unit->getName());
    }

    /**
     * @covers \PhpUnitsOfMeasure\AbstractPhysicalQuantity::getUnit
     */
    public function testGetUnitFailsOnUnknownUnit(): void
    {
        $this->expectException(\PhpUnitsOfMeasure\Exception\UnknownUnitOfMeasure::class);
        Wonkicity::getUnit('someUnknownUnit');
    }

    /**
     * @covers \PhpUnitsOfMeasure\AbstractPhysicalQuantity::__construct
     */
    public function testInstantiateNewUnit(): void
    {
        $value = new Wonkicity(1.234, 'quatloos');
    }

    /**
     * @covers \PhpUnitsOfMeasure\AbstractPhysicalQuantity::__construct
     */
    public function testInstantiateNewUnitNonNumericValue(): void
    {
        $this->expectException(\PhpUnitsOfMeasure\Exception\NonNumericValue::class);
        $value = new Wonkicity('string', 'quatloos');
    }

    /**
     * @covers \PhpUnitsOfMeasure\AbstractPhysicalQuantity::__construct
     */
    public function testInstantiateNewUnitNonStringUnit(): void
    {
        $this->expectException(\PhpUnitsOfMeasure\Exception\NonStringUnitName::class);
        $value = new Wonkicity(1.234, 42);
    }

    /**
     * @dataProvider quantityConversionsProvider
     * @covers \PhpUnitsOfMeasure\AbstractPhysicalQuantity::toUnit
     */
    public function testConvertToUnknownUnitThrowsException(
        AbstractPhysicalQuantity $value,
        $arbitraryUnit,
        $valueInArbitraryUnit
    ): void
    {
        $this->expectException(\PhpUnitsOfMeasure\Exception\UnknownUnitOfMeasure::class);
        $value->toUnit('someUnknownUnit');
    }

    /**
     * @dataProvider quantityConversionsProvider
     * @covers \PhpUnitsOfMeasure\AbstractPhysicalQuantity::toNativeUnit
     */
    public function testUnitConvertsToArbitraryUnit(
        AbstractPhysicalQuantity $value,
        $arbitraryUnit,
        $valueInArbitraryUnit
    ): void
    {
        $this->assertSame($valueInArbitraryUnit, $value->toUnit($arbitraryUnit));
    }

    /**
     * @dataProvider toStringProvider
     * @covers \PhpUnitsOfMeasure\AbstractPhysicalQuantity::__toString
     */
    public function testToString(AbstractPhysicalQuantity $value, $string): void
    {
        $this->assertSame($string, (string) $value);
    }

    /**
     * @dataProvider quantityConversionsProvider
     */
    public function testSerialize(
        AbstractPhysicalQuantity $value,
        $arbitraryUnit,
        $valueInArbitraryUnit
    ): void
    {
        serialize($value);
    }

    /**
     * @dataProvider quantityConversionsProvider
     */
    public function testUnserialize(
        AbstractPhysicalQuantity $value,
        $arbitraryUnit,
        $valueInArbitraryUnit
    ): void
    {
        $unserializedValue = unserialize(serialize($value));

        $this->assertSame($valueInArbitraryUnit, $unserializedValue->toUnit($arbitraryUnit));
    }

    /**
     * @dataProvider arithmeticProvider
     * @covers \PhpUnitsOfMeasure\AbstractPhysicalQuantity::add
     */
    public function testAdd(
        $shouldThrowException,
        AbstractPhysicalQuantity $firstValue,
        AbstractPhysicalQuantity $secondValue,
        $sumString,
        $diffString
    ): void
    {
        if ($shouldThrowException) {
            $this->expectException(PhysicalQuantityMismatch::class);
        }

        $sum = $firstValue->add($secondValue);

        if (!$shouldThrowException) {
            $this->assertSame($sumString, (string) $sum);
        }
    }

    /**
     * @dataProvider arithmeticProvider
     * @covers \PhpUnitsOfMeasure\AbstractPhysicalQuantity::subtract
     */
    public function testSubtract(
        $shouldThrowException,
        AbstractPhysicalQuantity $firstValue,
        AbstractPhysicalQuantity $secondValue,
        $sumString,
        $diffString
    ): void
    {
        if ($shouldThrowException) {
            $this->expectException(PhysicalQuantityMismatch::class);

        }

        $difference = $firstValue->subtract($secondValue);

        if (!$shouldThrowException) {
            $this->assertSame($diffString, (string) $difference);
        }
    }

    /**
     * @covers \PhpUnitsOfMeasure\AbstractPhysicalQuantity::getUnitDefinitions
     */
    public function testGetAllUnits(): void
    {
        $array = Wonkicity::getUnitDefinitions();

        $this->assertIsArray($array);

        $expected = array(Wonkicity::getUnit('u'), Wonkicity::getUnit('v'));
        $this->assertEquals($array, $expected);
    }

    /**
     * @covers \PhpUnitsOfMeasure\AbstractPhysicalQuantity::isUnitDefined
     */
    public function testIsUnitDefined(): void
    {
        $newUnit = $this->getTestUnitOfMeasure('noconflict', ['definitelynoconflict_1', 'definitelynoconflict_2']);
        Wonkicity::addUnit($newUnit);
        
        $someExistingUnits = ['u', 'uvees', 'v', 'vorp', 'noconflict', 'definitelynoconflict_1', 'definitelynoconflict_2'];
        $unexistingUnits = ['kg', 'l', 'definitelynoconflict_'];
        
        foreach ($someExistingUnits as $someExistingUnit) {
            $this->assertTrue(Wonkicity::isUnitDefined($someExistingUnit), "$someExistingUnit is not defined");
        }
        foreach ($unexistingUnits as $unexistingUnit) {
            $this->assertFalse(Wonkicity::isUnitDefined($unexistingUnit), "$unexistingUnit is not defined");
        }
    }
    
    /**
     * @covers \PhpUnitsOfMeasure\AbstractPhysicalQuantity::listAllUnits
     */
    public function testListAllUnits(): void
    {
        $newUnit = $this->getTestUnitOfMeasure('noconflict', ['definitelynoconflict_1', 'definitelynoconflict_2']);
        Wonkicity::addUnit($newUnit);
        
        $allUnits = Wonkicity::listAllUnits();
        $expected = [];
        $expected['u'] = ['uvee', 'uvees'];
        $expected['v'] = ['vorp', 'vorps'];
        $expected['noconflict'] = ['definitelynoconflict_1', 'definitelynoconflict_2'];
        $this->assertEquals($allUnits, $expected);
    }

    /**
     * Attempting to register these units should throw a DuplicateUnitNameOrAlias.
     * 1) The name of the new unit to test
     * 2) The set of aliases for the new unit to test
     */
    public function exceptionProducingUnitsProvider(): array
    {
        return [
            ['u', []],                 // new name / existing name collision
            ['noconflict', ['u']],     // new alias / existing name collision
            ['uvee', []],              // new name / existing alias collision
            ['noconflict', ['uvee']],  // new alias / existing alias collision
        ];
    }

    /**
     * Provide some conversion testing data
     * 1) the object from which to start
     * 2) The unit name to which to convert
     * 3) The expected resulting value of the conversion
     */
    public function quantityConversionsProvider(): array
    {
        return [
            [new Wonkicity(2, 'u'), 'u', 2],
            [new Wonkicity(2, 'u'), 'vorps', 2/3.5],
            [new Wonkicity(2, 'vorps'), 'u', 2*3.5],
            [new Wonkicity(2, 'vorps'), 'vorps', 2.0],
            [new Woogosity(2, 'p'), 'lupees', 2*4.5],
            [new Woogosity(2, 'p'), 'millilupees', 2*4.5*1000],
        ];
    }

    /**
     * Provide some string conversion testing data
     * 1) The object which will be cast to a string
     * 2) the expected resulting string from the conversion
     */
    public function toStringProvider(): array
    {
        return [
            [new Wonkicity(2, 'u'), '2 u'],
            [new Wonkicity(2, 'uvee'), '2 u'],
            [new Wonkicity(2, 'v'), '2 v'],
            [new Wonkicity(2, 'vorps'), '2 v'],
            [new Woogosity(2, 'plurps'), '2 p'],
            [new Woogosity(2, 'millilupees'), '2 ml'],
        ];
    }

    /**
     * Provide some arithmetic relations for testing
     * 1) Boolean - whether or not the operation shoul error out due to a type mismatch (PhysicalQuantityMismatch exception)
     * 2) The left-hand-side operand
     * 3) The right-hand-side operand
     * 4) The string-cast result of a sum operation with the two operands (ignored for errors)
     * 5) The string-cast result of a subtraction operation with the two operands (ignored for errors)
     */
    public function arithmeticProvider(): array
    {
        return [
            [false, new Wonkicity(2, 'u'), new Wonkicity(2.5, 'u'), '4.5 u', '-0.5 u'],
            [true,  new Wonkicity(2, 'u'), new Woogosity(2, 'l'), '', ''],
        ];
    }
}
