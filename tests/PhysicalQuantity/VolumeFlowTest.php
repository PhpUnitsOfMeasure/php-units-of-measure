<?php

namespace PhpUnitsOfMeasureTest\PhysicalQuantity;

use PhpUnitsOfMeasure\PhysicalQuantity\VolumeFlow;
use PhpUnitsOfMeasure\PhysicalQuantityInterface;

class VolumeFlowTest extends AbstractPhysicalQuantityTestCase
{
    protected array $supportedUnitsWithAliases = [
        'm^3/s',
        'm³/s',
        'cubic meter per second',
        'cubic meters per second',
        'cubic metre per second',
        'cubic metres per second',
        'Ym^3/s',
        'Ym³/s',
        'cubic yottameter per second',
        'cubic yottameters per second',
        'cubic yottametre per second',
        'cubic yottametres per second',
        'Zm^3/s',
        'Zm³/s',
        'cubic zettameter per second',
        'cubic zettameters per second',
        'cubic zettametre per second',
        'cubic zettametres per second',
        'Em^3/s',
        'Em³/s',
        'cubic exameter per second',
        'cubic exameters per second',
        'cubic exametre per second',
        'cubic exametres per second',
        'Pm^3/s',
        'Pm³/s',
        'cubic petameter per second',
        'cubic petameters per second',
        'cubic petametre per second',
        'cubic petametres per second',
        'Tm^3/s',
        'Tm³/s',
        'cubic terameter per second',
        'cubic terameters per second',
        'cubic terametre per second',
        'cubic terametres per second',
        'Gm^3/s',
        'Gm³/s',
        'cubic gigameter per second',
        'cubic gigameters per second',
        'cubic gigametre per second',
        'cubic gigametres per second',
        'Mm^3/s',
        'Mm³/s',
        'cubic megameter per second',
        'cubic megameters per second',
        'cubic megametre per second',
        'cubic megametres per second',
        'km^3/s',
        'km³/s',
        'cubic kilometer per second',
        'cubic kilometers per second',
        'cubic kilometre per second',
        'cubic kilometres per second',
        'hm^3/s',
        'hm³/s',
        'cubic hectometer per second',
        'cubic hectometers per second',
        'cubic hectometre per second',
        'cubic hectometres per second',
        'dam^3/s',
        'dam³/s',
        'cubic decameter per second',
        'cubic decameters per second',
        'cubic decametre per second',
        'cubic decametres per second',
        'dm^3/s',
        'dm³/s',
        'cubic decimeter per second',
        'cubic decimeters per second',
        'cubic decimetre per second',
        'cubic decimetres per second',
        'cm^3/s',
        'cm³/s',
        'cubic centimeter per second',
        'cubic centimeters per second',
        'cubic centimetre per second',
        'cubic centimetres per second',
        'mm^3/s',
        'mm³/s',
        'cubic millimeter per second',
        'cubic millimeters per second',
        'cubic millimetre per second',
        'cubic millimetres per second',
        'µm^3/s',
        'µm³/s',
        'cubic micrometer per second',
        'cubic micrometers per second',
        'cubic micrometre per second',
        'cubic micrometres per second',
        'nm^3/s',
        'nm³/s',
        'cubic nanometer per second',
        'cubic nanometers per second',
        'cubic nanometre per second',
        'cubic nanometres per second',
        'pm^3/s',
        'pm³/s',
        'cubic picometer per second',
        'cubic picometers per second',
        'cubic picometre per second',
        'cubic picometres per second',
        'fm^3/s',
        'fm³/s',
        'cubic femtometer per second',
        'cubic femtometers per second',
        'cubic femtometre per second',
        'cubic femtometres per second',
        'am^3/s',
        'am³/s',
        'cubic attometer per second',
        'cubic attometers per second',
        'cubic attometre per second',
        'cubic attometres per second',
        'zm^3/s',
        'zm³/s',
        'cubic zeptometer per second',
        'cubic zeptometers per second',
        'cubic zeptometre per second',
        'cubic zeptometres per second',
        'ym^3/s',
        'ym³/s',
        'cubic yoctometer per second',
        'cubic yoctometers per second',
        'cubic yoctometre per second',
        'cubic yoctometres per second',
        'm^3/min',
        'm³/min',
        'cmm',
        'CMM',
        'cubic meter per minute',
        'cubic meters per minute',
        'm^3/h',
        'm³/h',
        'cmh',
        'CMH',
        'cubic meter per hour',
        'cubic meters per hour',
        'l/s',
        'L/s',
        'liter per second',
        'liters per second',
        'litre per second',
        'litres per second',
        'Yl/s',
        'YL/s',
        'yottaliter per second',
        'yottaliters per second',
        'yottalitre per second',
        'yottalitres per second',
        'Zl/s',
        'ZL/s',
        'zettaliter per second',
        'zettaliters per second',
        'zettalitre per second',
        'zettalitres per second',
        'El/s',
        'EL/s',
        'exaliter per second',
        'exaliters per second',
        'exalitre per second',
        'exalitres per second',
        'Pl/s',
        'PL/s',
        'petaliter per second',
        'petaliters per second',
        'petalitre per second',
        'petalitres per second',
        'Tl/s',
        'TL/s',
        'teraliter per second',
        'teraliters per second',
        'teralitre per second',
        'teralitres per second',
        'Gl/s',
        'GL/s',
        'gigaliter per second',
        'gigaliters per second',
        'gigalitre per second',
        'gigalitres per second',
        'Ml/s',
        'ML/s',
        'megaliter per second',
        'megaliters per second',
        'megalitre per second',
        'megalitres per second',
        'kl/s',
        'kL/s',
        'kiloliter per second',
        'kiloliters per second',
        'kilolitre per second',
        'kilolitres per second',
        'hl/s',
        'hL/s',
        'hectoliter per second',
        'hectoliters per second',
        'hectolitre per second',
        'hectolitres per second',
        'dal/s',
        'daL/s',
        'decaliter per second',
        'decaliters per second',
        'decalitre per second',
        'decalitres per second',
        'dl/s',
        'dL/s',
        'deciliter per second',
        'deciliters per second',
        'decilitre per second',
        'decilitres per second',
        'cl/s',
        'cL/s',
        'centiliter per second',
        'centiliters per second',
        'centilitre per second',
        'centilitres per second',
        'ml/s',
        'mL/s',
        'milliliter per second',
        'milliliters per second',
        'millilitre per second',
        'millilitres per second',
        'µl/s',
        'µL/s',
        'microliter per second',
        'microliters per second',
        'microlitre per second',
        'microlitres per second',
        'nl/s',
        'nL/s',
        'nanoliter per second',
        'nanoliters per second',
        'nanolitre per second',
        'nanolitres per second',
        'pl/s',
        'pL/s',
        'picoliter per second',
        'picoliters per second',
        'picolitre per second',
        'picolitres per second',
        'fl/s',
        'fL/s',
        'femtoliter per second',
        'femtoliters per second',
        'femtolitre per second',
        'femtolitres per second',
        'al/s',
        'aL/s',
        'attoliter per second',
        'attoliters per second',
        'attolitre per second',
        'attolitres per second',
        'zl/s',
        'zL/s',
        'zeptoliter per second',
        'zeptoliters per second',
        'zeptolitre per second',
        'zeptolitres per second',
        'yl/s',
        'yL/s',
        'yoctoliter per second',
        'yoctoliters per second',
        'yoctolitre per second',
        'yoctolitres per second',
        'l/min',
        'L/min',
        'lpm',
        'LPM',
        'liter per minute',
        'liters per minute',
        'litre per minute',
        'litres per minute',
        'l/h',
        'L/h',
        'lph',
        'LPH',
        'liter per hour',
        'liters per hour',
        'litre per hour',
        'litres per hour',
        'ft^3/s',
        'cfs',
        'CFS',
        'ft³/s',
        'cubic foot per second',
        'cubic feet per second',
        'ft^3/min',
        'cfm',
        'CFM',
        'ft³/min',
        'cubic foot per minute',
        'cubic feet per minute',
        'ft^3/h',
        'cfh',
        'CFH',
        'ft³/h',
        'cubic foot per hour',
        'cubic feet per hour',
        'gal/s',
        'gps',
        'GPS',
        'gallon per second',
        'gallons per second',
        'us gal/s',
        'gal/min',
        'gpm',
        'GPM',
        'gallon per minute',
        'gallons per minute',
        'us gal/min',
        'gal/h',
        'gph',
        'GPH',
        'gallon per hour',
        'gallons per hour',
        'us gal/h',
        'gal/d',
        'gpd',
        'GPD',
        'gallon per day',
        'gallons per day',
        'us gal/d'
    ];

    protected function instantiateTestQuantity(): PhysicalQuantityInterface
    {
        return new VolumeFlow(1, 'm^3/s');
    }

    public function testToCubicDecimeterSecond(): void
    {
        $area = new VolumeFlow(1, 'm^3/s');
        /*
        foreach ($area->listAllUnits() as $unit => $aliases) {
            echo("        '$unit',\n");
            foreach ($aliases as $alias) {
                echo("        '$alias',\n");
            }
        }
        */
        $this->assertEquals(1000, $area->toUnit('dm^3/s'));
        $area = new VolumeFlow(100, 'm^3/s');
        $this->assertEquals(100000, $area->toUnit('dm^3/s'));
    }


    public function testToCubicMillimeterSecond(): void
    {
        $area = new VolumeFlow(1, 'm^3/s');
        $this->assertEqualsWithDelta(1e9, $area->toUnit('mm^3/s'), 0.000001);
        $area = new VolumeFlow(100, 'm^3/s');
        $this->assertEquals(1e11, $area->toUnit('mm^3/s'));
    }

    public function testToLitresSecond(): void
    {
        $area = new VolumeFlow(1, 'm^3/s');
        $this->assertEquals(1000, $area->toUnit('l/s'));
        $area = new VolumeFlow(100, 'm^3/s');
        $this->assertEquals(100000, $area->toUnit('l/s'));
    }

    public function testToMilliLitresSecond(): void
    {
        $area = new VolumeFlow(1, 'l/s');
        $this->assertEquals(1000, $area->toUnit('ml/s'));
        $area = new VolumeFlow(100, 'l/s');
        $this->assertEquals(100000, $area->toUnit('ml/s'));
    }

    public function testToHectoLitresSecond(): void
    {
        $area = new VolumeFlow(1, 'l/s');
        $this->assertEquals(0.01, $area->toUnit('hl/s'));
        $area = new VolumeFlow(100, 'l/s');
        $this->assertEquals(1, $area->toUnit('hl/s'));
    }

    public function testToKiloLitresSecond(): void
    {
        $area = new VolumeFlow(1, 'l/s');
        $this->assertEquals(0.001, $area->toUnit('kl/s'));
        $area = new VolumeFlow(100, 'l/s');
        $this->assertEquals(0.1, $area->toUnit('kl/s'));
    }

    public function testToCFM()
    {
        $area = new VolumeFlow(1, 'CMM');
        $this->assertEqualsWithDelta(35.314667, $area->toUnit('CFM'), 0.000001);
        $area = new VolumeFlow(100, 'm^3/s');
        $this->assertEqualsWithDelta(211888.000328, $area->toUnit('CFM'), 0.000001);
    }
}
