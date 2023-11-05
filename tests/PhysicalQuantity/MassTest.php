<?php

namespace PhpUnitsOfMeasureTest\PhysicalQuantity;

use PhpUnitsOfMeasure\PhysicalQuantity\Mass;
use PhpUnitsOfMeasure\PhysicalQuantityInterface;

class MassTest extends AbstractPhysicalQuantityTestCase
{
    protected $supportedUnitsWithAliases = [
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
        'T',
        'ton',
        'tons',
        'tonne',
        'tonnes',
        'MT',
        'mT',
        'lb',
        'lbs',
        'pound',
        'pounds',
        'oz',
        'ounce',
        'ounces',
        'st',
        'stone',
        'stones',
        'cwt',
        'hundredweight',
        'hundredweights',
        'ukt',
        'uk long ton',
        'uk long tons',
        'ust',
        'us short ton',
        'us short tons',
        'picul',
        'tam',
    ];

    protected function instantiateTestQuantity(): PhysicalQuantityInterface
    {
        return new Mass(1, 'g');
    }

    public function testToGrams(): void
    {
        $quantity = new Mass(5, 'kg');
        $this->assertEquals(5000, $quantity->toUnit('g'));
    }

    public function testToMilligrams(): void
    {
        $quantity = new Mass(5, 'kg');
        $this->assertEquals(5*1e6, $quantity->toUnit('mg'));
    }

    public function testToPounds(): void
    {
        $quantity = new Mass(16, 'oz');
        $this->assertEquals(1, $quantity->toUnit('pound'));
    }

    public function testToStones(): void
    {
        $quantity = new Mass(14, 'pound');
        $this->assertEquals(1, $quantity->toUnit('st'));
    }

    public function testToHundredweight(): void
    {
        $quantity = new Mass(5, 'kg');
        $this->assertEqualsWithDelta(0.098420653, (float)$quantity->toUnit('cwt'), 0.00000001);
    }

    public function testToUSshortTon(): void
    {
        $quantity = new Mass(5, 'kg');
        $this->assertEqualsWithDelta(0.0055115566, $quantity->toUnit('ust'), 0.000000001);
    }

    public function testToUSlongTon(): void
    {
        $quantity = new Mass(5, 'kg');
        $this->assertEqualsWithDelta(0.0049210326, $quantity->toUnit('ukt'), 0.000000001);
    }

    public function testToPicul(): void
    {
        $quantity = new Mass(5, 'kg');
        $this->assertEqualsWithDelta(0.08267335, $quantity->toUnit('picul'), 0.00000001);
    }
}
