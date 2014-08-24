<?php

namespace PhpUnitsOfMeasureTest;

use PhpUnitsOfMeasure\PhysicalQuantity;
use PhpUnitsOfMeasure\UnitOfMeasureInterface;

class PhysicalQuantityTest extends \PHPUnit_Framework_TestCase
{
    protected function getMockUnitOfMeasure($name, $aliases = [])
    {
        $newUnit = $this->getMock('\PhpUnitsOfMeasure\UnitOfMeasureInterface');
        $newUnit->expects($this->any())
            ->method('getName')
            ->will($this->returnValue($name));
                $newUnit->expects($this->any())
            ->method('getAliases')
            ->will($this->returnValue($aliases));

        return $newUnit;
    }

    /**
     * @covers \PhpUnitsOfMeasure\PhysicalQuantity::__construct
     */
    public function testInstantiateNewUnit()
    {
        $value = $this->getMockForAbstractClass(
            '\PhpUnitsOfMeasure\PhysicalQuantity',
            [1.234, 'quatloos']
        );
    }

    /**
     * @covers \PhpUnitsOfMeasure\PhysicalQuantity::__toString
     */
    public function testToString()
    {
        $value = $this->getMockForAbstractClass(
            '\PhpUnitsOfMeasure\PhysicalQuantity',
            [1.234, 'quatloos']
        );

        // Quatloos
        $newUnit = $this->getMockUnitOfMeasure('quatloos');
        $value->registerUnitOfMeasure($newUnit);

        $this->assertSame('1.234 quatloos', (string) $value);
    }

    /**
     * @covers \PhpUnitsOfMeasure\PhysicalQuantity::registerUnitOfMeasure
     * @covers \PhpUnitsOfMeasure\PhysicalQuantity::toUnit
     * @covers \PhpUnitsOfMeasure\PhysicalQuantity::findUnitOfMeasureByNameOrAlias
     */
    public function testUnitConverts()
    {
        $value = $this->getMockForAbstractClass(
            '\PhpUnitsOfMeasure\PhysicalQuantity',
            [1.234, 'quatloos']
        );

        // Quatloos
        $newUnit = $this->getMockUnitOfMeasure('quatloos');
        $newUnit->expects($this->once())
            ->method('convertValueToNativeUnitOfMeasure')
            ->will($this->returnValue(1.234));

        $value->registerUnitOfMeasure($newUnit);

        // Galactic Imperial Widgets (let's say it's defined as 2 quatloos)
        $newUnit = $this->getMockUnitOfMeasure('galimpwid');
        $newUnit->expects($this->once())
            ->method('convertValueFromNativeUnitOfMeasure')
            ->will($this->returnValue(2.468));

        $value->registerUnitOfMeasure($newUnit);

        $valueInGalimpwids = $value->toUnit('galimpwid');

        $this->assertSame(2.468, $valueInGalimpwids);
    }

    /**
     * @covers \PhpUnitsOfMeasure\PhysicalQuantity::registerUnitOfMeasure
     * @expectedException \PhpUnitsOfMeasure\Exception\DuplicateUnitNameOrAlias
     */
    public function testRegisterUnitFailsOnDuplicateName()
    {
        $value = $this->getMockForAbstractClass(
            '\PhpUnitsOfMeasure\PhysicalQuantity',
            [1.234, 'quatloos']
        );

        $newUnit = $this->getMockUnitOfMeasure('quatloos');
        $value->registerUnitOfMeasure($newUnit);

        $newUnit = $this->getMockUnitOfMeasure('quatloos');
        $value->registerUnitOfMeasure($newUnit);
    }

    /**
     * @covers \PhpUnitsOfMeasure\PhysicalQuantity::registerUnitOfMeasure
     * @expectedException \PhpUnitsOfMeasure\Exception\DuplicateUnitNameOrAlias
     */
    public function testRegisterUnitFailsOnDuplicateAlias()
    {
        $value = $this->getMockForAbstractClass(
            '\PhpUnitsOfMeasure\PhysicalQuantity',
            [1.234, 'quatloos']
        );

        $newUnit = $this->getMockUnitOfMeasure('quatloos');
        $value->registerUnitOfMeasure($newUnit);

        $newUnit = $this->getMockUnitOfMeasure('galimpwid', ['quatloos']);
        $value->registerUnitOfMeasure($newUnit);
    }

    /**
     * @covers \PhpUnitsOfMeasure\PhysicalQuantity::findUnitOfMeasureByNameOrAlias
     * @expectedException \PhpUnitsOfMeasure\Exception\UnknownUnitOfMeasure
     */
    public function testUnknownUnit()
    {
        $value = $this->getMockForAbstractClass(
            '\PhpUnitsOfMeasure\PhysicalQuantity',
            [1.234, 'quatloos']
        );

        // Quatloos
        $newUnit = $this->getMockUnitOfMeasure('quatloos');
        $value->registerUnitOfMeasure($newUnit);

        $valueInGalimpwids = $value->toUnit('galimpwid');
    }

    /**
     * @covers \PhpUnitsOfMeasure\PhysicalQuantity::getSupportedUnits
     */
    public function testgetSupportedUnits()
    {
        $value = $this->getMockForAbstractClass(
            '\PhpUnitsOfMeasure\PhysicalQuantity',
            [1.234, 'quatloos']
        );

        // Quatloos
        $newUnit = $this->getMockUnitOfMeasure('quatloos', ['qa', 'qs']);
        $value->registerUnitOfMeasure($newUnit);

        // Schmoos
        $newUnit = $this->getMockUnitOfMeasure('schmoos', ['sc', 'sm']);
        $value->registerUnitOfMeasure($newUnit);

        $this->assertSame(['quatloos', 'schmoos'], $value->getSupportedUnits());
    }

    /**
     * @covers \PhpUnitsOfMeasure\PhysicalQuantity::getSupportedUnits
     */
    public function testgetSupportedUnitsWithAliases()
    {
        $value = $this->getMockForAbstractClass(
            '\PhpUnitsOfMeasure\PhysicalQuantity',
            [1.234, 'quatloos']
        );

        // Quatloos
        $newUnit = $this->getMockUnitOfMeasure('quatloos', ['qa', 'qs']);
        $value->registerUnitOfMeasure($newUnit);

        // Schmoos
        $newUnit = $this->getMockUnitOfMeasure('schmoos', ['sc', 'sm']);
        $value->registerUnitOfMeasure($newUnit);

        $this->assertSame(
            ['quatloos', 'qa', 'qs', 'schmoos', 'sc', 'sm'],
            $value->getSupportedUnits(true)
        );
    }

    /**
     * @covers \PhpUnitsOfMeasure\PhysicalQuantity::add
     */
    public function testAdd()
    {
        $first  = new \PhpUnitsOfMeasure\PhysicalQuantity\Volume(6, 'liters');
        $second = new \PhpUnitsOfMeasure\PhysicalQuantity\Volume(6, 'cups');

        $sum = $first->add($second);
        $this->assertSame('7.4195292 l', (string) $sum);
    }

    /**
     * @covers \PhpUnitsOfMeasure\PhysicalQuantity::add
     *
     * @expectedException \PhpUnitsOfMeasure\Exception\PhysicalQuantityMismatch
     */
    public function testAddThrowsExceptionOnQuantityMismatch()
    {
        $first  = new \PhpUnitsOfMeasure\PhysicalQuantity\Volume(6, 'liters');
        $second = new \PhpUnitsOfMeasure\PhysicalQuantity\Mass(6, 'g');

        $sum = $first->add($second);
    }

    /**
     * @covers \PhpUnitsOfMeasure\PhysicalQuantity::subtract
     */
    public function testSubtract()
    {
        $first  = new \PhpUnitsOfMeasure\PhysicalQuantity\Volume(6, 'liters');
        $second = new \PhpUnitsOfMeasure\PhysicalQuantity\Volume(6, 'cups');

        $difference = $first->subtract($second);
        $this->assertSame('4.5804708 l', (string) $difference);
    }

    /**
     * @covers \PhpUnitsOfMeasure\PhysicalQuantity::subtract
     *
     * @expectedException \PhpUnitsOfMeasure\Exception\PhysicalQuantityMismatch
     */
    public function testSubtractThrowsExceptionOnQuantityMismatch()
    {
        $first  = new \PhpUnitsOfMeasure\PhysicalQuantity\Volume(6, 'liters');
        $second = new \PhpUnitsOfMeasure\PhysicalQuantity\Mass(6, 'g');

        $sum = $first->subtract($second);
    }
}
