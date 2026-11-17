<?php

namespace PhpUnitsOfMeasureTest\PhysicalQuantity;

use PHPUnit\Framework\TestCase;
use PhpUnitsOfMeasure\PhysicalQuantityInterface;

/**
 * This is a parent class for all the PhysicalQuantity childrens' test cases.
 */
abstract class AbstractPhysicalQuantityTestCase extends TestCase
{
    protected array $supportedUnitsWithAliases = [];

    /**
     * Verify that the object instantiates without error.
     */
    public function testConstructorSucceeds(): void
    {
        $this->instantiateTestQuantity();
    }

    /**
     * Convert to each of the known supported units, verifying that no
     * exceptions are thrown.
     */
    public function testSupportedUnits(): void
    {
        $quantity = $this->instantiateTestQuantity();

        foreach ($this->supportedUnitsWithAliases as $unit) {
            $quantity->toUnit($unit);
        }
    }

    /**
     * Converting a value into every unit and back must return the original value.
     */
    public function testRoundTripConversion(): void
    {
        $quantity = $this->instantiateTestQuantity();
        $class = get_class($quantity);
        $nativeValue = $quantity->toNativeUnit();

        foreach (array_keys($quantity::listAllUnits()) as $unit) {
            $value = $quantity->toUnit($unit);
            $back = (new $class($value, $unit))->toNativeUnit();
            $this->assertEqualsWithDelta(
                $nativeValue,
                $back,
                abs($nativeValue) * 1e-9 + 1e-12,
                "Round trip through unit '$unit' failed"
            );
        }
    }

    /**
     * Build a test object of the target physical quantity.
     */
    abstract protected function instantiateTestQuantity(): PhysicalQuantityInterface;
}
