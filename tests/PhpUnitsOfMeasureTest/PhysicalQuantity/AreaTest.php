<?php 

namespace PhpUnitsOfMeasureTest\PhysicalQuantity;

use PhpUnitsOfMeasure\PhysicalQuantity\Area;
use PHPUnit_Framework_TestCase;

class AreaTest extends PHPUnit_Framework_TestCase
{

    public function testToHectares()
    {
        $area = new Area(3, 'ha');

        $this->assertEquals(30000, $area->toUnit("m^2"));
    }


    /**
     * There aren't lots of super nice conversions between ac -> m^2,
     * so we'll check that it's close. 
     * 
     * @return [type] [description]
     */
    public function testToAcres()
    {
        $area = new Area(13, 'ac');
        
        $area = round($area->toUnit("m^2"), 6);

        $this->assertEquals(52609.133491, $area);
    }
}
