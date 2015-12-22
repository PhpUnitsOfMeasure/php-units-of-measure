<?php

namespace PhpUnitsOfMeasureTest;

use PHPUnit_Framework_TestCase;
use PhpUnitsOfMeasure\AbstractPhysicalQuantity;
use PhpUnitsOfMeasure\UnitOfMeasureInterface;
use PhpUnitsOfMeasure\Exception\PhysicalQuantityMismatch;
use PhpUnitsOfMeasure\Exception\DuplicateUnitNameOrAlias;
use PhpUnitsOfMeasure\Exception\NonNumericValue;
use PhpUnitsOfMeasure\Exception\NonStringUnitName;
use PhpUnitsOfMeasure\Exception\UnknownUnitOfMeasure;
use PhpUnitsOfMeasureTest\Fixtures\PhysicalQuantity\Wonkicity;
use PhpUnitsOfMeasureTest\Fixtures\PhysicalQuantity\Woogosity;

/**
 * Because of the large amount of global state preserved in the static
 * properties of the various physical quantity classes, we'll run
 * each test in this file its own process.
 *
 * @runTestsInSeparateProcesses
 */
class AbstractPhysicalQuantityTest extends PHPUnit_Framework_TestCase
{
    protected function getTestUnitOfMeasure($name, $aliases = [])
    {
        $newUnit = $this->getMockBuilder('PhpUnitsOfMeasure\UnitOfMeasureInterface')
            ->getMock();
        $newUnit->method('getName')
            ->willReturn($name);
        $newUnit->method('getAliases')
            ->willReturn($aliases);

        return $newUnit;
    }

    /**
     * @covers \PhpUnitsOfMeasure\AbstractPhysicalQuantity::addUnit
     */
    public function testAddUnit()
    {
        $newUnit = $this->getTestUnitOfMeasure('noconflict', ['definitelynoconflict']);

        Wonkicity::addUnit($newUnit);
    }

    /**
     * @dataProvider exceptionProducingUnitsProvider
     * @covers \PhpUnitsOfMeasure\AbstractPhysicalQuantity::addUnit
     * @expectedException \PhpUnitsOfMeasure\Exception\DuplicateUnitNameOrAlias
     */
    public function testAddUnitFailsOnNameCollision($unitName, $unitAliases)
    {
        $newUnit = $this->getTestUnitOfMeasure($unitName, $unitAliases);

        Wonkicity::addUnit($newUnit);
    }

    /**
     * @covers \PhpUnitsOfMeasure\AbstractPhysicalQuantity::getUnit
     */
    public function testGetUnit()
    {
        $unit = Wonkicity::getUnit('u');

        $this->assertSame('u', $unit->getName());
    }

    /**
     * @covers \PhpUnitsOfMeasure\AbstractPhysicalQuantity::getUnit
     * @expectedException \PhpUnitsOfMeasure\Exception\UnknownUnitOfMeasure
     */
    public function testGetUnitFailsOnUnknownUnit()
    {
        Wonkicity::getUnit('someUnknownUnit');
    }

    /**
     * @covers \PhpUnitsOfMeasure\AbstractPhysicalQuantity::__construct
     */
    public function testInstantiateNewUnit()
    {
        $value = new Wonkicity(1.234, 'quatloos');
    }

    /**
     * @covers \PhpUnitsOfMeasure\AbstractPhysicalQuantity::__construct
     * @expectedException \PhpUnitsOfMeasure\Exception\NonNumericValue
     */
    public function testInstantiateNewUnitNonNumericValue()
    {
        $value = new Wonkicity('string', 'quatloos');
    }

    /**
     * @covers \PhpUnitsOfMeasure\AbstractPhysicalQuantity::__construct
     * @expectedException \PhpUnitsOfMeasure\Exception\NonStringUnitName
     */
    public function testInstantiateNewUnitNonStringUnit()
    {
        $value = new Wonkicity(1.234, 42);
    }

    /**
     * @dataProvider quantityConversionsProvider
     * @covers \PhpUnitsOfMeasure\AbstractPhysicalQuantity::toUnit
     * @expectedException \PhpUnitsOfMeasure\Exception\UnknownUnitOfMeasure
     */
    public function testConvertToUnknownUnitThrowsException(
        AbstractPhysicalQuantity $value,
        $arbitraryUnit,
        $valueInArbitraryUnit
    ) {
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
    ) {
        $this->assertSame($valueInArbitraryUnit, $value->toUnit($arbitraryUnit));
    }

    /**
     * @dataProvider toStringProvider
     * @covers \PhpUnitsOfMeasure\AbstractPhysicalQuantity::__toString
     */
    public function testToString(AbstractPhysicalQuantity $value, $string)
    {
        $this->assertSame($string, (string) $value);
    }

    /**
     *
     * @dataProvider quantityConversionsProvider
     */
    public function testSerialize(
        AbstractPhysicalQuantity $value,
        $arbitraryUnit,
        $valueInArbitraryUnit
    ) {
        serialize($value);
    }

    /**
     * @dataProvider quantityConversionsProvider
     */
    public function testUnserialize(
        AbstractPhysicalQuantity $value,
        $arbitraryUnit,
        $valueInArbitraryUnit
    ) {
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
    ) {
        if ($shouldThrowException) {
            $this->setExpectedException('PhpUnitsOfMeasure\Exception\PhysicalQuantityMismatch');
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
    ) {
        if ($shouldThrowException) {
            $this->setExpectedException('PhpUnitsOfMeasure\Exception\PhysicalQuantityMismatch');
        }

        $difference = $firstValue->subtract($secondValue);

        if (!$shouldThrowException) {
            $this->assertSame($diffString, (string) $difference);
        }
    }

    /**
     * @covers \PhpUnitsOfMeasure\AbstractPhysicalQuantity::getUnitDefinitions
     */
    public function testGetAllUnits() {
      $array = Wonkicity::getUnitDefinitions();

      $this->assertTrue(is_array($array));

      $expected = array(Wonkicity::getUnit('u'), Wonkicity::getUnit('v'));
      $this->assertEquals($array, $expected);
    }

    /**
     * Attempting to register these units should throw a DuplicateUnitNameOrAlias.
     * 1) The name of the new unit to test
     * 2) The set of aliases for the new unit to test
     */
    public function exceptionProducingUnitsProvider()
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
    public function quantityConversionsProvider()
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
    public function toStringProvider()
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
    public function arithmeticProvider()
    {
        return [
            [false, new Wonkicity(2, 'u'), new Wonkicity(2.5, 'u'), '4.5 u', '-0.5 u'],
            [true,  new Wonkicity(2, 'u'), new Woogosity(2, 'l'), '', ''],
        ];
    }
}
