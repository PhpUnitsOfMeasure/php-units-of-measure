<?php

namespace PhpUnitsOfMeasure\PhysicalQuantity;

use \PhpUnitsOfMeasure\PhysicalQuantity;
use \PhpUnitsOfMeasure\UnitOfMeasure;
use \PhpUnitsOfMeasure\PhysicalQuantity\Area;

class AreaTest extends \PHPUnit_Framework_TestCase
{
    public function testConvertSiToThaiUnit ()
    {
        $area = new Area(1600, 'm^2');
        $this->assertEquals(400, $area->toUnit('wa^2'));
        $this->assertEquals(4, $area->toUnit('ngan'));
        $this->assertEquals(1, $area->toUnit('rai'));
    }

    public function testConvertThaiUnitToSi ()
    {
        $area = new Area(1, 'rai');
        $this->assertEquals(1600, $area->toUnit('m^2'));

        $area = new Area(4, 'ngan');
        $this->assertEquals(1600, $area->toUnit('m^2'));

        $area = new Area(400, 'wa^2');
        $this->assertEquals(1600, $area->toUnit('m^2'));
      
    }
}
