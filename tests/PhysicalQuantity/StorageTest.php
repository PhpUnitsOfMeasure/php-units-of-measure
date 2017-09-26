<?php

namespace PhpUnitsOfMeasureTest\PhysicalQuantity;

use PhpUnitsOfMeasure\PhysicalQuantity\Storage;

class StorageTest extends AbstractPhysicalQuantityTestCase
{

    protected function instantiateTestQuantity()
    {
    }

    public function testByteToByte()
    {
        $this->assertEquals(1, (new Storage(1, 'byte'))->toUnit('B'));
    }

    public function testByteToBit()
    {
        $this->assertEquals(40, (new Storage(5, 'byte'))->toUnit('bit'));
    }

    public function testBitToByte()
    {
        $this->assertEquals(1.25, (new Storage(10, 'b'))->toUnit('B'));
    }

    public function testMegabyteToByte()
    {
        $this->assertEquals(1048576, (new Storage(1, 'MB'))->toUnit('B'));
    }

    public function testGigabyteToByte()
    {
        $this->assertEquals(1073741824, (new Storage(1, 'gigabyte'))->toUnit('byte'));
    }

    public function testTerabyteToByte()
    {
        $this->assertEquals(1099511627776, (new Storage(1, 'TB'))->toUnit('byte'));
    }

    public function testPetabyteToByte()
    {
        $this->assertEquals(3377699720527872, (new Storage(3, 'PB'))->toUnit('byte'));
    }

}