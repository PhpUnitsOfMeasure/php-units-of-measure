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
}
