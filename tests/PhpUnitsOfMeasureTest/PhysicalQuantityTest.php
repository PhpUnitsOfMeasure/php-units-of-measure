<?php

namespace PhpUnitsOfMeasureTest;

use PhpUnitsOfMeasure\PhysicalQuantity;
use PhpUnitsOfMeasure\UnitOfMeasureInterface;

class PhysicalQuantityTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers \PhpUnitsOfMeasure\PhysicalQuantity::__construct
     */
    public function testInstantiateNewUnit()
    {
        $value = $this->getMockForAbstractClass(
            '\PhpUnitsOfMeasure\PhysicalQuantity',
            array(1.234, 'quatloos')
        );
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
            array(1.234, 'quatloos')
        );

        // Quatloos
        $new_unit = $this->getMock('\PhpUnitsOfMeasure\UnitOfMeasureInterface');
        $new_unit->expects($this->any())
            ->method('getName')
            ->will($this->returnValue('quatloos'));
        $new_unit->expects($this->once())
            ->method('convertValueToNativeUnitOfMeasure')
            ->will($this->returnValue(1.234));

        $value->registerUnitOfMeasure($new_unit);

        // Galactic Imperial Widgets (let's say it's defined as 2 quatloos)
        $new_unit = $this->getMock('\PhpUnitsOfMeasure\UnitOfMeasureInterface');
        $new_unit->expects($this->any())
            ->method('getName')
            ->will($this->returnValue('galimpwid'));
        $new_unit->expects($this->once())
            ->method('convertValueFromNativeUnitOfMeasure')
            ->will($this->returnValue(2.468));

        $value->registerUnitOfMeasure($new_unit);

        $value_in_galimpwids = $value->toUnit('galimpwid');

        $this->assertSame(2.468, $value_in_galimpwids);
    }

    /**
     * @covers \PhpUnitsOfMeasure\PhysicalQuantity::findUnitOfMeasureByNameOrAlias
     * @expectedException \PhpUnitsOfMeasure\Exception\UnknownUnitOfMeasure
     */
    public function testUnknownUnit()
    {
        $value = $this->getMockForAbstractClass(
            '\PhpUnitsOfMeasure\PhysicalQuantity',
            array(1.234, 'quatloos')
        );

        // Quatloos
        $new_unit = $this->getMock('\PhpUnitsOfMeasure\UnitOfMeasureInterface');
        $new_unit->expects($this->any())
            ->method('getName')
            ->will($this->returnValue('quatloos'));

        $value->registerUnitOfMeasure($new_unit);

        $value_in_galimpwids = $value->toUnit('galimpwid');
    }

    /**
     * @covers \PhpUnitsOfMeasure\PhysicalQuantity::__toString
     */
    public function testToString()
    {
        $value = $this->getMockForAbstractClass(
            '\PhpUnitsOfMeasure\PhysicalQuantity',
            array(1.234, 'quatloos')
        );

        // Quatloos
        $new_unit = $this->getMock('\PhpUnitsOfMeasure\UnitOfMeasureInterface');
        $new_unit->expects($this->any())
            ->method('getName')
            ->will($this->returnValue('quatloos'));

        $value->registerUnitOfMeasure($new_unit);

        $this->assertSame('1.234 quatloos', (string) $value);
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
