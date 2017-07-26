<?php

namespace PhpUnitsOfMeasureTest\PhysicalQuantity;

use PhpUnitsOfMeasure\PhysicalQuantity\Population;

class PopulationTest extends AbstractPhysicalQuantityTestCase
{
    protected $supportedUnitsWithAliases = [
        'person',
        'persons',
        'µperson',
        'microperson',
        'micropersons',
        'mperson',
        'milliperson',
        'millipersons',
        'kperson',
        'kiloperson',
        'kilopersons',
        'Mperson',
        'megaperson',
        'megapersons',
        'Gperson',
        'gigaperson',
        'gigapersons',
        'Tperson',
        'teraperson',
        'terapersons',
        'Pperson',
        'petaperson',
        'petapersons',
    ];

    protected function instantiateTestQuantity()
    {
        return new Population(1, 'person');
    }

    public function testToKiloPerson()
    {
        $quantity = new Population(1000, 'person');
        $this->assertEquals(1, $quantity->toUnit('kperson'));
    }

    public function testToPerson()
    {
        $quantity = new Population(1, 'kperson');
        $this->assertEquals(1000, $quantity->toUnit('person'));
    }
}
