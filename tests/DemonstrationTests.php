<?php

namespace PhpUnitsOfMeasureTest;

use PHPUnit_Framework_TestCase;

use PhpUnitsOfMeasure\UnitOfMeasure;
use PhpUnitsOfMeasure\AbstractDerivedPhysicalQuantity;
use PhpUnitsOfMeasure\DerivedPhysicalQuantityFactory;
use PhpUnitsOfMeasure\PhysicalQuantity\UnknownDerivedPhysicalQuantity;
use PhpUnitsOfMeasureTest\Fixtures\PhysicalQuantity\Plooposity;
use PhpUnitsOfMeasureTest\Fixtures\PhysicalQuantity\Pumpalumpiness;
use PhpUnitsOfMeasureTest\Fixtures\PhysicalQuantity\Wigginess;
use PhpUnitsOfMeasureTest\Fixtures\PhysicalQuantity\Wonkicity;
use PhpUnitsOfMeasureTest\Fixtures\PhysicalQuantity\Woogosity;

/**
 * These tests serve as a high-level verification that the basic
 * behavior of this library is performing as expected.
 *
 * In addition, these tests should be a clearer demonstration
 * of the intended use cases than the set of unit tests would be.
 *
 * To clarify things a bit, the example physical quantity classes
 * used in the tests below are defined the same way that real
 * quantities would be defined.  Please review these test fixtures
 * for examples of how real quantities would be created.
 *
 * Because of the large amount of global state preserved in the static
 * properties of the various physical quantity classes, we'll run
 * each test in this file its own process.
 *
 * @runTestsInSeparateProcesses
 */
class DemonstrationTests extends PHPUnit_Framework_TestCase
{
    public function testInstantiatingQuantities()
    {
        // New quantities are created like this, with
        // the class name being the physical quantity that
        // is being measured, and the parameters being the
        // scalar value and unit of measure, respectively.
        //
        // Note that each unit can be referred to by several names
        // (for example sopee, sopees, s).
        $a = new Wigginess(1, 'sopee');
        $this->assertInstanceOf('PhpUnitsOfMeasureTest\Fixtures\PhysicalQuantity\Wigginess', $a);

        $a = new Wigginess(2.123, 'sopees');
        $this->assertInstanceOf('PhpUnitsOfMeasureTest\Fixtures\PhysicalQuantity\Wigginess', $a);

        $a = new Wigginess(2.6, 's');
        $this->assertInstanceOf('PhpUnitsOfMeasureTest\Fixtures\PhysicalQuantity\Wigginess', $a);

        $a = new Wigginess(1, 'tumpet');
        $this->assertInstanceOf('PhpUnitsOfMeasureTest\Fixtures\PhysicalQuantity\Wigginess', $a);

        $a = new Wigginess(2.123, 'tumpets');
        $this->assertInstanceOf('PhpUnitsOfMeasureTest\Fixtures\PhysicalQuantity\Wigginess', $a);

        $a = new Wigginess(2.6, 't');
        $this->assertInstanceOf('PhpUnitsOfMeasureTest\Fixtures\PhysicalQuantity\Wigginess', $a);
    }

    public function testStringConversionForQuantities()
    {
        // Casting physical quantity objects to strings will
        // produce a reasonable string describing the quantity.
        $a = new Wigginess(21.123, 'sopees');
        $this->assertSame('21.123 s', (string) $a);

        $a = new Wigginess(21.123, 'tumpets');
        $this->assertSame('21.123 t', (string) $a);
    }

    public function testUnitConversionForQuantities()
    {
        // Creating equivalent quantities from existing
        // quantities in different units of measure is done
        // with the toUnit() method.  Note that the method
        // returns a new object, and does not modify the
        // unit of the object on which it is called.
        //
        // (In imaginary Testworld, 2.5 sopees is 1 tumpet.
        // See the Wigginess.php example class for details
        // on how these units are defined.)
        $a = new Wigginess(21, 'sopees');
        $this->assertSame(21, $a->toUnit('sopee'));
        $this->assertSame(21/2.5, $a->toUnit('tumpets'));
        $this->assertSame(21/2.5, $a->toUnit('t'));
    }

    public function testCreatingNewUnitsForQuantities()
    {
        // New units of measure can be defined and registered
        // with physical quantities on the fly.

        // Here, we create three new units, demonstrating the 3
        // different methods for instantiating them.  These units
        // will exist in addition to the units that come 'out of
        // the box' for the given quantity, once they're registered
        // with the static addUnit().

        // The linear unit factory is useful for defining new
        // units that are a simple scaling factor conversion
        // to the quantity's native unit of measure.
        // In this case there are 4.5 bbbb's in the native unit of measure.
        $unitA = UnitOfMeasure::linearUnitFactory('bbbb', 4.5);
        Wigginess::addUnit($unitA);

        // Using the native unit factory method is equivalent to a
        // linear unit with a factor of 1.  It's convenient for creating
        // a unit to represent the native unit of measure.
        $unitB = UnitOfMeasure::nativeUnitFactory('aaaa');
        Wigginess::addUnit($unitB);

        // The long form constructor is necessary for units
        // that don't have simple scaling factor functions for
        // their conversions.  For this unit we'll also add 2 more
        // aliases (dddd and eeee) that serve as equivalent names
        // for the unit's real name (cccc).
        $unitC = new UnitOfMeasure(
            'cccc',
            function ($valueInNativeUnit) {
                return $valueInNativeUnit - 100;
            },
            function ($valueInThisUnit) {
                return $valueInThisUnit + 100;
            }
        );
        $unitC->addAlias('dddd');
        $unitC->addAlias('eeee');
        Wigginess::addUnit($unitC);


        // Here we can see that the units defined above
        // convert as expected with the built-in units.
        $a = new Wigginess(21, 'sopees');
        $this->assertSame(21, $a->toUnit('aaaa'));
        $this->assertSame(21/4.5, $a->toUnit('bbbb'));
        $this->assertSame(21-100, $a->toUnit('cccc'));
        $this->assertSame(21-100, $a->toUnit('dddd'));
        $this->assertSame(21-100, $a->toUnit('eeee'));

        $b = new Wigginess(21, 'tumpets');
        $this->assertSame(21*2.5, $b->toUnit('aaaa'));
        $this->assertSame(21/4.5*2.5, $b->toUnit('bbbb'));
        $this->assertSame((21*2.5)-100, $b->toUnit('cccc'));
        $this->assertSame((21*2.5)-100, $b->toUnit('dddd'));
        $this->assertSame((21*2.5)-100, $b->toUnit('eeee'));
    }

    public function testAutomaticSIUnitsForQuantities()
    {
        // SI units have a standard prefix naming convention to easily
        // provide powers-of-ten versions of a standard unit.  For instance,
        // for the physical quantity length, the meter is the standard SI
        // unit, and 1000 meters is a kilometer, 1/1000th of a meter is a
        // millimeter, and so on.
        //
        // The Woogosity class has the HasSIUnitsTrait trait, and can
        // automatically generate new units for a given unit, for all
        // the standard SI prefixes.  See the Woogosity.php class file
        // for an example of how this is done.
        $a = new Woogosity(21, 'plurp');

        $this->assertInstanceOf('PhpUnitsOfMeasureTest\Fixtures\PhysicalQuantity\Woogosity', $a);
        $this->assertSame(21*4.5 * 1e3, $a->toUnit('millilupees'));
        $this->assertSame(21*4.5 * 1e3, $a->toUnit('ml'));
        $this->assertSame(21*4.5 / 1e6, $a->toUnit('megalupees'));
        $this->assertSame(21*4.5 / 1e6, $a->toUnit('Ml'));
    }

    public function testAddQuantities()
    {
        // Two quantities of equivalent value can be summed
        // by calling the add method.
        $a = new Wigginess(3, 'sopee');
        $b = new Wigginess(2, 'tumpet');
        $c = $a->add($b);

        $this->assertInstanceOf('PhpUnitsOfMeasureTest\Fixtures\PhysicalQuantity\Wigginess', $c);
        $this->assertSame(3 + (2*2.5), $c->toUnit('sopee'));
    }

    public function testSubtractQuantities()
    {
        // Similar to the add method, subtract called on the
        // left-hand-side operand object will subtract the
        // parameter quantity and produce a new value.
        $a = new Wigginess(3, 'sopee');
        $b = new Wigginess(2, 'tumpet');
        $c = $a->subtract($b);

        $this->assertInstanceOf('PhpUnitsOfMeasureTest\Fixtures\PhysicalQuantity\Wigginess', $c);
        $this->assertSame(3 - (2*2.5), $c->toUnit('sopee'));
    }
}
