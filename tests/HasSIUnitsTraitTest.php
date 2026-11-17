<?php

namespace PhpUnitsOfMeasureTest;

use PHPUnit\Framework\TestCase;
use PhpUnitsOfMeasureTest\Fixtures\PhysicalQuantity\Plumbosity;
use PhpUnitsOfMeasureTest\Fixtures\PhysicalQuantity\SquarePlumbosity;

class HasSIUnitsTraitTest extends TestCase
{
    /**
     * @dataProvider prefixProvider
     */
    public function testGeneratesAllPrefixes(string $abbr, string $long, float $factor): void
    {
        $value = new Plumbosity(1, $abbr . 'pb');
        $this->assertEqualsWithDelta($factor, $value->toNativeUnit(), $factor * 1e-12);

        // Long and uppercase aliases resolve to the same unit
        $this->assertEqualsWithDelta($factor, (new Plumbosity(1, $long . 'plumb'))->toNativeUnit(), $factor * 1e-12);
        $this->assertEqualsWithDelta(
            $factor,
            (new Plumbosity(1, strtoupper($long) . 'plumb'))->toNativeUnit(),
            $factor * 1e-12
        );
    }

    /**
     * Kilo is omitted: the fixture pre-defines 'kpb', see testDoesNotOverrideExistingUnit().
     */
    public function prefixProvider(): array
    {
        return [
            ['Q', 'quetta', 1e30],
            ['R', 'ronna', 1e27],
            ['Y', 'yotta', 1e24],
            ['Z', 'zetta', 1e21],
            ['E', 'exa', 1e18],
            ['P', 'peta', 1e15],
            ['T', 'tera', 1e12],
            ['G', 'giga', 1e9],
            ['M', 'mega', 1e6],
            ['h', 'hecto', 1e2],
            ['da', 'deca', 1e1],
            ['d', 'deci', 1e-1],
            ['c', 'centi', 1e-2],
            ['m', 'milli', 1e-3],
            ['µ', 'micro', 1e-6],
            ['n', 'nano', 1e-9],
            ['p', 'pico', 1e-12],
            ['f', 'femto', 1e-15],
            ['a', 'atto', 1e-18],
            ['z', 'zepto', 1e-21],
            ['y', 'yocto', 1e-24],
        ];
    }

    public function testDoesNotOverrideExistingUnit(): void
    {
        $value = new Plumbosity(1, 'kpb');
        $this->assertSame(5, $value->toNativeUnit());
        $this->assertFalse(Plumbosity::isUnitDefined('kiloplumb'));
    }

    public function testGeneratedUnitCount(): void
    {
        // native + custom 'kpb' + 21 generated prefixes (kilo skipped)
        $this->assertCount(23, Plumbosity::getUnitDefinitions());
    }

    public function testBaseFactorAndPowerFactor(): void
    {
        $this->assertEqualsWithDelta(1e12, (new SquarePlumbosity(1, 'Mpb^2'))->toNativeUnit(), 1e-3);
        $this->assertEqualsWithDelta(1e6, (new SquarePlumbosity(1, 'kpb^2'))->toNativeUnit(), 1e-9);
        $this->assertEqualsWithDelta(1e-6, (new SquarePlumbosity(1, 'mpb^2'))->toNativeUnit(), 1e-18);
        $this->assertEqualsWithDelta(1e-4, (new SquarePlumbosity(1, 'cpb^2'))->toNativeUnit(), 1e-16);
        $this->assertEqualsWithDelta(1e60, (new SquarePlumbosity(1, 'Qpb^2'))->toNativeUnit(), 1e48);
    }
}
