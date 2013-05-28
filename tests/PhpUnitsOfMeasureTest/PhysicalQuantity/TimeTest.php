<?php

namespace PhpUnitsOfMeasureTest\PhysicalQuantity;

use PhpUnitsOfMeasure\PhysicalQuantity\Time;

class TimeTest extends \PHPUnit_Framework_TestCase
{

    public function testToSeconds()
    {
        $angle = new Time(5, 'm');
        $this->assertEquals(300, $angle->toUnit('seconds'));
    }

    public function testToMinutes()
    {
        $angle = new Time(360, 'sec');
        $this->assertEquals(6, $angle->toUnit('min'));
    }

    public function testToHours()
    {
        $angle = new Time(120, 'mins');
        $this->assertEquals(2, $angle->toUnit('hrs'));
    }

    public function testToDays()
    {
        $angle = new Time(72, 'hours');
        $this->assertEquals(3, $angle->toUnit('days'));
    }

    public function testToWeeks()
    {
        $angle = new Time(14, 'd');
        $this->assertEquals(2, $angle->toUnit('week'));
    }
}
