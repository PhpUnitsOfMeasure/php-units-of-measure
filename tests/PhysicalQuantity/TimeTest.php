<?php

namespace PhpUnitsOfMeasureTest\PhysicalQuantity;

use PhpUnitsOfMeasure\PhysicalQuantity\Time;
use PhpUnitsOfMeasure\PhysicalQuantityInterface;

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

    protected function instantiateTestQuantity(): PhysicalQuantityInterface
    {
        return new Time(1, 'sec');
    }

    public function testToSeconds(): void
    {
        $angle = new Time(5, 'm');
        $this->assertEquals(300, $angle->toUnit('seconds'));
    }

    public function testToMinutes(): void
    {
        $angle = new Time(360, 'sec');
        $this->assertEquals(6, $angle->toUnit('min'));
    }

    public function testToHours(): void
    {
        $angle = new Time(120, 'mins');
        $this->assertEquals(2, $angle->toUnit('hrs'));
    }

    public function testToDays(): void
    {
        $angle = new Time(72, 'hours');
        $this->assertEquals(3, $angle->toUnit('days'));
    }

    public function testToWeeks(): void
    {
        $angle = new Time(14, 'd');
        $this->assertEquals(2, $angle->toUnit('week'));
    }

    public function testToGregorianYears(): void
    {
        $angle = new Time(365.2425, 'd');
        $this->assertEquals(1, $angle->toUnit('yr'));
    }

    public function testToJulianYears(): void
    {
        $angle = new Time(365.25, 'd');
        $this->assertEquals(1, $angle->toUnit('jyr'));
    }

    public function testToDecades(): void
    {
        $value = new Time(315569520, 's');
        $this->assertEqualsWithDelta(1, $value->toUnit('decade'), 0.000001);
    }

    public function testToCenturies(): void
    {
        $value = new Time(3155695200, 's');
        $this->assertEqualsWithDelta(1, $value->toUnit('century'), 0.000001);
    }

    public function testToMillennia(): void
    {
        $value = new Time(31556952000, 's');
        $this->assertEqualsWithDelta(1, $value->toUnit('millennium'), 0.000001);
    }

    public function testToRonnaseconds(): void
    {
        $value = new Time(1e+27, 's');
        $this->assertEqualsWithDelta(1, $value->toUnit('Rs'), 0.000001);
    }

    public function testToQuettaseconds(): void
    {
        $value = new Time(1e+30, 's');
        $this->assertEqualsWithDelta(1, $value->toUnit('Qs'), 0.000001);
    }
}
