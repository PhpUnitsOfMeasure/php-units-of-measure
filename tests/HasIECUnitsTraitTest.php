<?php

namespace PhpUnitsOfMeasureTest;

use PHPUnit\Framework\TestCase;
use PhpUnitsOfMeasureTest\Fixtures\PhysicalQuantity\Bitosity;

class HasIECUnitsTraitTest extends TestCase
{
    /**
     * @dataProvider binaryPrefixProvider
     */
    public function testBinaryPrefixes(string $abbr, string $long, int $power): void
    {
        $factor = 2 ** (10 * $power);

        $this->assertEqualsWithDelta($factor, (new Bitosity(1, $abbr . 'd'))->toNativeUnit(), $factor * 1e-12);
        $this->assertEqualsWithDelta($factor, (new Bitosity(1, $long . 'dec'))->toNativeUnit(), $factor * 1e-12);
        $this->assertEqualsWithDelta(
            $factor,
            (new Bitosity(1, strtoupper($long) . 'dec'))->toNativeUnit(),
            $factor * 1e-12
        );

        // Binary prefixes are always powers of 1024, regardless of the SI base
        $this->assertEqualsWithDelta(
            $factor * 8,
            (new Bitosity(1, $abbr . 'Bin'))->toNativeUnit(),
            $factor * 8e-12
        );
    }

    public function binaryPrefixProvider(): array
    {
        return [
            ['Ki', 'kibi', 1],
            ['Mi', 'mebi', 2],
            ['Gi', 'gibi', 3],
            ['Ti', 'tebi', 4],
            ['Pi', 'pebi', 5],
            ['Ei', 'exbi', 6],
            ['Zi', 'zebi', 7],
            ['Yi', 'yobi', 8],
        ];
    }

    /**
     * @dataProvider siPrefixProvider
     */
    public function testSiPrefixesDefaultBase(string $abbr, string $long, int $power): void
    {
        $factor = 10 ** (3 * $power);

        $this->assertEqualsWithDelta((float) $factor, (new Bitosity(1, $abbr . 'd'))->toNativeUnit(), $factor * 1e-12);
        $this->assertEqualsWithDelta(
            (float) $factor,
            (new Bitosity(1, $long . 'dec'))->toNativeUnit(),
            $factor * 1e-12
        );
    }

    /**
     * @dataProvider siPrefixProvider
     */
    public function testSiPrefixesBase1024(string $abbr, string $long, int $power): void
    {
        $factor = 8 * 1024 ** $power;

        $this->assertEqualsWithDelta((float) $factor, (new Bitosity(1, $abbr . 'Bin'))->toNativeUnit(), $factor * 1e-12);
        $this->assertEqualsWithDelta(
            (float) $factor,
            (new Bitosity(1, $long . 'bin'))->toNativeUnit(),
            $factor * 1e-12
        );
    }

    public function siPrefixProvider(): array
    {
        return [
            ['k', 'kilo', 1],
            ['M', 'mega', 2],
            ['G', 'giga', 3],
            ['T', 'tera', 4],
            ['P', 'peta', 5],
            ['E', 'exa', 6],
            ['Z', 'zetta', 7],
            ['Y', 'yotta', 8],
            ['R', 'ronna', 9],
            ['Q', 'quetta', 10],
        ];
    }

    public function testNoSubmultiples(): void
    {
        $this->assertFalse(Bitosity::isUnitDefined('md'));
        $this->assertFalse(Bitosity::isUnitDefined('millidec'));
    }

    public function testGeneratedUnitCount(): void
    {
        // 2 series x (native + 8 binary + 10 decimal prefixes)
        $this->assertCount(38, Bitosity::getUnitDefinitions());
    }
}
