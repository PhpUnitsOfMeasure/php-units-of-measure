<?php

namespace PhpUnitsOfMeasureTest\PhysicalQuantity;

use PhpUnitsOfMeasure\PhysicalQuantity\Storage;
use PhpUnitsOfMeasure\PhysicalQuantityInterface;

class StorageTest extends AbstractPhysicalQuantityTestCase
{

    protected function instantiateTestQuantity(): PhysicalQuantityInterface
    {
        return new Storage(1, 'byte');
    }

    public function testByteToByte(): void
    {
        $storage = new Storage(1, 'byte');
        $this->assertEquals(1, $storage->toUnit('B'));
        $storage = new Storage(1, 'B');
        $this->assertEquals(0.008, $storage->toUnit('kb'));
    }

    public function testByteToBit(): void
    {
        $storage = new Storage(5, 'byte');
        $this->assertEquals(40, $storage->toUnit('bit'));
    }

    public function testBitToByte(): void
    {
        $storage = new Storage(10, 'b');
        $this->assertEquals(1.25, $storage->toUnit('B'));
    }

    public function testMegabyteToByte(): void
    {
        $storage = new Storage(1, 'MB');
        $this->assertEquals(1048576, $storage->toUnit('B'));
    }

    public function testGibibyteToByte(): void
    {
        $storage = new Storage(1, 'gibibytes');
        $this->assertEquals(1073741824, $storage->toUnit('byte'));
        $storage = new Storage(1, 'GiB');
        $this->assertEquals(1073741824, $storage->toUnit('byte'));
    }

    public function testGigabyteToByte(): void
    {
        $storage = new Storage(1, 'gigabyte');
        $this->assertEquals(1073741824, $storage->toUnit('byte'));
        // 6GByte
        $storage = new Storage(6, 'GByte');
        $this->assertEquals(6*1024*1024*1024, $storage->toUnit('byte'));
    }

    public function testTerabyteToByte(): void
    {
        $storage = new Storage(1, 'TB');
        $this->assertEquals(1099511627776, $storage->toUnit('byte'));
    }

    public function testPetabyteToByte(): void
    {
        $storage = new Storage(3, 'PB');
        $this->assertEquals(3377699720527872, $storage->toUnit('byte'));
    }
}
