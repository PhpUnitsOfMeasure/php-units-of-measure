<?php

namespace PhpUnitsOfMeasureTest\PhysicalQuantity;

use PhpUnitsOfMeasure\PhysicalQuantity\Length;

class LengthTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Verify that the object instantiates without error.
     *
     * @covers \PhpUnitsOfMeasure\PhysicalQuantity\Length::__construct()
     */
    public function testConstructorSucceeds()
    {
        $quantity = new Length(1, 'm');
    }

    /**
     * This test is here to help make sure the tests are in sync with the code
     */
    public function testSupportedUnits()
    {
        $supportedUnitsWithAliases = [
            'm',
            'meter',
            'meters',
            'metre',
            'metres',
            'Ym',
            'yottameter',
            'yottameters',
            'yottametre',
            'yottametres',
            'Zm',
            'zettameter',
            'zettameters',
            'zettametre',
            'zettametres',
            'Em',
            'exameter',
            'exameters',
            'exametre',
            'exametres',
            'Pm',
            'petameter',
            'petameters',
            'petametre',
            'petametres',
            'Tm',
            'terameter',
            'terameters',
            'terametre',
            'terametres',
            'Gm',
            'gigameter',
            'gigameters',
            'gigametre',
            'gigametres',
            'Mm',
            'megameter',
            'megameters',
            'megametre',
            'megametres',
            'km',
            'kilometer',
            'kilometers',
            'kilometre',
            'kilometres',
            'hm',
            'hectometer',
            'hectometers',
            'hectometre',
            'hectometres',
            'dam',
            'decameter',
            'decameters',
            'decametre',
            'decametres',
            'dm',
            'decimeter',
            'decimeters',
            'decimetre',
            'decimetres',
            'cm',
            'centimeter',
            'centimeters',
            'centimetre',
            'centimetres',
            'mm',
            'millimeter',
            'millimeters',
            'millimetre',
            'millimetres',
            'µm',
            'micrometer',
            'micrometers',
            'micrometre',
            'micrometres',
            'nm',
            'nanometer',
            'nanometers',
            'nanometre',
            'nanometres',
            'pm',
            'picometer',
            'picometers',
            'picometre',
            'picometres',
            'fm',
            'femtometer',
            'femtometers',
            'femtometre',
            'femtometres',
            'am',
            'attometer',
            'attometers',
            'attometre',
            'attometres',
            'zm',
            'zeptometer',
            'zeptometers',
            'zeptometre',
            'zeptometres',
            'ym',
            'yoctometer',
            'yoctometers',
            'yoctometre',
            'yoctometres',
            'ft',
            'foot',
            'feet',
            'in',
            'inch',
            'inches',
            'mi',
            'mile',
            'miles',
            'yd',
            'yard',
            'yards',
        ];

        $quantity = new Length(1, 'm');
        $this->assertEquals(
            $supportedUnitsWithAliases,
            $quantity->getSupportedUnits(true)
        );
    }

    public function testToMillimeters()
    {
        $quantity = new Length(5, 'm');
        $this->assertEquals(5000, $quantity->toUnit('mm'));
    }

    public function testToMegameters()
    {
        $quantity = new Length(5, 'm');
        $this->assertEquals(5/1e6, $quantity->toUnit('Mm'));
    }

    public function testToInches()
    {
        $quantity = new Length(2, 'ft');
        $this->assertEquals(24, $quantity->toUnit('in'));
    }
}
