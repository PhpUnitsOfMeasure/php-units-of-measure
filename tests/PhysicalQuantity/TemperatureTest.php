<?php

namespace PhpUnitsOfMeasureTest\PhysicalQuantity;

use PhpUnitsOfMeasure\PhysicalQuantity\Temperature;
use PhpUnitsOfMeasure\PhysicalQuantityInterface;

class TemperatureTest extends AbstractPhysicalQuantityTestCase
{
    protected array $supportedUnitsWithAliases = [
        'K',
        '°K',
        'kelvin',
        'YK',
        'yottakelvin',
        'ZK',
        'zettakelvin',
        'EK',
        'exakelvin',
        'PK',
        'petakelvin',
        'TK',
        'terakelvin',
        'GK',
        'gigakelvin',
        'MK',
        'megakelvin',
        'kK',
        'kilokelvin',
        'hK',
        'hectokelvin',
        'daK',
        'decakelvin',
        'dK',
        'decikelvin',
        'cK',
        'centikelvin',
        'mK',
        'millikelvin',
        'µK',
        'microkelvin',
        'nK',
        'nanokelvin',
        'pK',
        'picokelvin',
        'fK',
        'femtokelvin',
        'aK',
        'attokelvin',
        'zK',
        'zeptokelvin',
        'yK',
        'yoctokelvin',
        '°C',
        'C',
        'celsius',
        '°F',
        'F',
        'fahrenheit',
        '°R',
        'R',
        'rankine',
        '°De',
        'De',
        'delisle',
        '°N',
        'N',
        'newton',
        '°Ré',
        '°Re',
        'Ré',
        'Re',
        'réaumur',
        'reaumur',
        '°Rø',
        '°Ro',
        'Rø',
        'Ro',
        'rømer',
        'romer',
    ];

    protected function instantiateTestQuantity(): PhysicalQuantityInterface
    {
        return new Temperature(1, 'K');
    }

    public function testToCelsius()
    {
        $value = new Temperature(313.15, 'K');
        $this->assertEquals(40, $value->toUnit('C'), '', 0.000001);
    }

    public function testToFahrenheit()
    {
        $value = new Temperature(313.15, 'K');
        $this->assertEquals(104, $value->toUnit('F'), '', 0.000001);
    }

    public function testToRankine()
    {
        $value = new Temperature(313.15, 'K');
        $this->assertEquals(563.67, $value->toUnit('Ra'), '', 0.000001);
    }
    public function testToDelisle()
    {
        $value = new Temperature(313.15, 'K');
        $this->assertEquals(90, $value->toUnit('D'), '', 0.000001);
    }

    public function testToNewton()
    {
        $value = new Temperature(313.15, 'K');
        $this->assertEquals(13.2, $value->toUnit('N'), '', 0.000001);
    }

    public function testToReaumur()
    {
        $value = new Temperature(313.15, 'K');
        $this->assertEquals(32, $value->toUnit('Re'), '', 0.000001);
    }

    public function testToRomer()
    {
        $value = new Temperature(313.15, 'K');
        $this->assertEquals(28.5, $value->toUnit('Ro'), '', 0.000001);
    }
}
