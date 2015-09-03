<?php

namespace PhpUnitsOfMeasureTest\PhysicalQuantity;

use PhpUnitsOfMeasure\PhysicalQuantity\Time;

class TimeTest extends AbstractPhysicalQuantityTestCase
{
    protected $supportedUnitsWithAliases = [
        's',
        'sec',
        'secs',
        'second',
        'seconds',
        'Ys',
        'yottasec',
        'yottasecs',
        'yottasecond',
        'yottaseconds',
        'Zs',
        'zettasec',
        'zettasecs',
        'zettasecond',
        'zettaseconds',
        'Es',
        'exasec',
        'exasecs',
        'exasecond',
        'exaseconds',
        'Ps',
        'petasec',
        'petasecs',
        'petasecond',
        'petaseconds',
        'Ts',
        'terasec',
        'terasecs',
        'terasecond',
        'teraseconds',
        'Gs',
        'gigasec',
        'gigasecs',
        'gigasecond',
        'gigaseconds',
        'Ms',
        'megasec',
        'megasecs',
        'megasecond',
        'megaseconds',
        'ks',
        'kilosec',
        'kilosecs',
        'kilosecond',
        'kiloseconds',
        'hs',
        'hectosec',
        'hectosecs',
        'hectosecond',
        'hectoseconds',
        'das',
        'decasec',
        'decasecs',
        'decasecond',
        'decaseconds',
        'ds',
        'decisec',
        'decisecs',
        'decisecond',
        'deciseconds',
        'cs',
        'centisec',
        'centisecs',
        'centisecond',
        'centiseconds',
        'ms',
        'millisec',
        'millisecs',
        'millisecond',
        'milliseconds',
        'µs',
        'microsec',
        'microsecs',
        'microsecond',
        'microseconds',
        'ns',
        'nanosec',
        'nanosecs',
        'nanosecond',
        'nanoseconds',
        'ps',
        'picosec',
        'picosecs',
        'picosecond',
        'picoseconds',
        'fs',
        'femtosec',
        'femtosecs',
        'femtosecond',
        'femtoseconds',
        'as',
        'attosec',
        'attosecs',
        'attosecond',
        'attoseconds',
        'zs',
        'zeptosec',
        'zeptosecs',
        'zeptosecond',
        'zeptoseconds',
        'ys',
        'yoctosec',
        'yoctosecs',
        'yoctosecond',
        'yoctoseconds',
        'm',
        'min',
        'mins',
        'minute',
        'minutes',
        'h',
        'hr',
        'hrs',
        'hour',
        'hours',
        'd',
        'day',
        'days',
        'w',
        'wk',
        'wks',
        'week',
        'weeks',
        'yr',
        'year',
        'years',
        'gregorian year',
        'gregorian years',
        'jyr',
        'julian year',
        'julian years',
    ];

    protected function instantiateTestQuantity()
    {
        return new Time(1, 'sec');
    }

    public function testToSeconds()
    {
        $angle = new Time(5, 'm');
        $this->assertEquals(300, $angle->toUnit('seconds')->getValue());
    }

    public function testToMinutes()
    {
        $angle = new Time(360, 'sec');
        $this->assertEquals(6, $angle->toUnit('min')->getValue());
    }

    public function testToHours()
    {
        $angle = new Time(120, 'mins');
        $this->assertEquals(2, $angle->toUnit('hrs')->getValue());
    }

    public function testToDays()
    {
        $angle = new Time(72, 'hours');
        $this->assertEquals(3, $angle->toUnit('days')->getValue());
    }

    public function testToWeeks()
    {
        $angle = new Time(14, 'd');
        $this->assertEquals(2, $angle->toUnit('week')->getValue());
    }

    public function testToGregorianYears()
    {
        $angle = new Time(365.2425, 'd');
        $this->assertEquals(1, $angle->toUnit('yr')->getValue());
    }

    public function testToJulianYears()
    {
        $angle = new Time(365.25, 'd');
        $this->assertEquals(1, $angle->toUnit('jyr')->getValue());
    }
}
