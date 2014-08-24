<?php

namespace PhpUnitsOfMeasureTest\PhysicalQuantity;

use PhpUnitsOfMeasure\PhysicalQuantity\Mass;

class MassTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Verify that the object instantiates without error.
     *
     * @covers \PhpUnitsOfMeasure\PhysicalQuantity\Mass::__construct()
     */
    public function testConstructorSucceeds()
    {
        $target = new Mass(1, 'kg');
    }

    /**
     * This test is here to help make sure the tests are in sync with the code
     */
    public function testSupportedUnits()
    {
        $supportedUnitsWithAliases = [
            'kg',
            'kilogram',
            'kilograms',
            'Yg',
            'yottagram',
            'yottagrams',
            'Zg',
            'zettagram',
            'zettagrams',
            'Eg',
            'exagram',
            'exagrams',
            'Pg',
            'petagram',
            'petagrams',
            'Tg',
            'teragram',
            'teragrams',
            'Gg',
            'gigagram',
            'gigagrams',
            'Mg',
            'megagram',
            'megagrams',
            'hg',
            'hectogram',
            'hectograms',
            'dag',
            'decagram',
            'decagrams',
            'g',
            'gram',
            'grams',
            'dg',
            'decigram',
            'decigrams',
            'cg',
            'centigram',
            'centigrams',
            'mg',
            'milligram',
            'milligrams',
            'µg',
            'microgram',
            'micrograms',
            'ng',
            'nanogram',
            'nanograms',
            'pg',
            'picogram',
            'picograms',
            'fg',
            'femtogram',
            'femtograms',
            'ag',
            'attogram',
            'attograms',
            'zg',
            'zeptogram',
            'zeptograms',
            'yg',
            'yoctogram',
            'yoctograms',
            't',
            'ton',
            'tons',
            'tonne',
            'tonnes',
            'lb',
            'lbs',
            'pound',
            'pounds',
            'oz',
            'ounce',
            'ounces',
        ];

        $quantity = new Mass(1, 'kg');
        $this->assertEquals(
            $supportedUnitsWithAliases,
            $quantity->getSupportedUnits(true)
        );
    }

    public function testToGrams()
    {
        $quantity = new Mass(5, 'kg');
        $this->assertEquals(5000, $quantity->toUnit('g'));
    }

    public function testToMilligrams()
    {
        $quantity = new Mass(5, 'kg');
        $this->assertEquals(5*1e6, $quantity->toUnit('mg'));
    }
}
