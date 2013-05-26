# PHP Units of Measure
master: [![Build Status](https://travis-ci.org/triplepoint/php-units-of-measure.png?branch=master)](https://travis-ci.org/triplepoint/php-units-of-measure)

## Introduction
This is a PHP library for representing and converting physical units of measure.  The utility of this library
is in encapsulating physical quantities in such a way that you don't have to keep track of which
unit they're represented in.  For instance:

``` php
use PhpUnitsOfMeasure\PhysicalQuantity\Length;

$height = new Length(6.16, 'feet');
echo $height->toUnit('m');

// would print 1.87757, which is 6.16 feet in meters.
```

Having this abstraction allows you to create interfaces that accept physical quantities
without requiring them to be in a particular unit.  For example, this function assumes the
height is a float of a particular unit (presumably feet):

``` php
function isTooTallToRideThisTrain( $height )
{
  return $height > 5;
}

// Calling the function requires that you first convert whatever quantity you have into the expected units:
isTooTallToRideThisTrain(2 / 0.3048);
```

Whereas this version allows for height to be provided in whatever unit is convenient:

``` php
use PhpUnitsOfMeasure\PhysicalQuantity\Length;

function isTooTallToRideThisTrain( Length $height )
{
  return $height->toUnit('ft') > 5;
}

// Calling the function now allows any unit to be used:
isTooTallToRideThisTrain( new Length(2, 'm') );
```

## Installation
This library is best included in your projects via composer.  See the [Composer website](http://getcomposer.org/)
for more details, and see the [Packagist.org site for this library](https://packagist.org/packages/triplepoint/php-units-of-measure).

## Use
### Conversion
As in the examples above, the basic usage of this library is in representing physical quantities and converting
between typical units of measure.  For example:

``` php
$quantity = new \PhpUnitsOfMeasure\PhysicalQuantity\Mass(6, 'lbs');
echo $quantity->toUnit('g');
```
It's also possible to implicity cast a quantity to a string, which will display its original value:

``` php
$quantity = new \PhpUnitsOfMeasure\PhysicalQuantity\Mass(6, 'pounds');
echo $quantity; // '6 lbs'
```

### Arithmetic Operators
There's also support for addition and subtraction.  The `PhysicalQuantity` objects are immutable, and as such
these arithmetic methods return new quantity objects representing the results:

``` php
$first  = new \PhpUnitsOfMeasure\PhysicalQuantity\Volume(6, 'liters');
$second = new \PhpUnitsOfMeasure\PhysicalQuantity\Volume(6, 'cups');

$sum = $first->add($second);
echo $sum; // 7.4195292 l

$difference = $first->subtract($second);
echo $difference; // 4.5804708 l
```

### Adding new Units of Measure to Existing Quantities
Ocassionally, you will need to add a new unit of measure to a pre-existing quantity.

For example, let's say in a project you need a new measure of length, called "cubits".  You have two
options: you can permanently add the new unit of measure to the `\PhpUnitsOfMeasure\PhysicalQuantity\Length`
class (and submit a pull request to get it added upstream, if appropriate), or you can add the
unit temporarily at run time, inside your calling code.

#### Adding a New Unit of Measure at Runtime
To add a new unit of measure to an existing quantity at run time, you'd do this:

``` php
use \PhpUnitsOfMeasure\PhysicalQuantity\Length;
use \PhpUnitsOfMeasure\PhysicalQuantity\UnitOfMeasure;

// It's ok to use cubits here, since the conversion doesn't happen until later
$length = new Length(14, 'cubits');

// Build a new Unit of Measure object which represents the new unit, and which knows how to convert between
// the new unit and the quantity's native unit (in this case, meters).
$cubit = new UnitOfMeasure(

    // This is the official name of this unit - typically it's the standard abbreviation
    'cb',

    // The second parameter is a closure that converts from the native unit to this unit
    function ($x) {
        return $x / 0.4572;
    },

    // The third parameter is a closure that converts from this unit to the native unit
    function ($x) {
        return $x * 0.4572;
    }
);

// Any alias names for this unit can be added here, to make it easier to use variations
$cubit->addAlias('cubit');
$cubit->addAlias('cubits');

// Register the new unit of measure with the quantity object
$length->registerUnitOfMeasure($cubit);

// Now that the unit is registered, you can cast the measurement to any other measure of length
echo $length->toUnit('feet'); // '21'
```

#### Permanently Adding a New Unit of Measure to a Physical Quantity
The above method only applies to the specific Length object and is therefore temporary; it would
be necessary to repeat this process every time you created a new measurement and wanted to use cubits.

A new unit of measure can be permanently added to a physical quantity class by essentially the same process,
only it would be done inside the constructor of the quantity class.  For example:

``` php
namespace PhpUnitsOfMeasure\PhysicalQuantity;

use \PhpUnitsOfMeasure\PhysicalQuantity;
use \PhpUnitsOfMeasure\UnitOfMeasure;

class Length extends PhysicalQuantity
{
    public function __construct($value, $unit)
    {
        parent::__construct($value, $unit);

        // ...
        // ...
        // Here's all the pre-existing unit definitions for Length
        // ...
        // ...

        // Build a new Unit of Measure object which represents the new unit, and which knows how to convert between
        // the new unit and the quantity's native unit (in this case, meters).
        $cubit = new UnitOfMeasure(

            // This is the official name of this unit - typically it's the standard abbreviation
            'cb',

            // The second parameter is a closure that converts from the native unit to this unit
            function ($x) {
                return $x / 0.4572;
            },

            // The third parameter is a closure that converts from this unit to the native unit
            function ($x) {
                return $x * 0.4572;
            }
        );

        // Any alias names for this unit can be added here, to make it easier to use variations
        $cubit->addAlias('cubit');
        $cubit->addAlias('cubits');

        // Register the new unit of measure with the quantity object
        $this->registerUnitOfMeasure($cubit);
    }
}
```

Now any new object of class `Length` that gets instantiated will come with the cubits unit already built in.

### Adding New Physical Quantities
[Physical quantities](http://en.wikipedia.org/wiki/Physical_quantity) are categories of measurable values, like mass, length, force, etc.

For physical quantities that are not already present in this library, it will be necessary to write a class
to support a new one.  All physical quantities extend the `\PhpUnitsOfMeasure\PhysicalQuantity` class, and typically
have only a constructor method which creates the quantity's units of measure.  See above for examples on how to add
new units to a quantity class.

Note that every physical quantity has a chosen "native unit" which is typically the SI standard.  The main point for this
unit is that all of the quantity's other units of measure will convert to and from this chosen native unit.  It's
important to be aware of a quantity's native unit when writing conversions for new units of measure.

### Adding new Aliases to Existing Units
It may come up that the right unit of measure exists for the right physical quantity, but there's a missing
alias for the unit.  For example, if you thought 'footses' was an obviously lacking alias for the Length unit 'ft', you could
temporarily add the alias like this:

``` php
use \PhpUnitsOfMeasure\PhysicalQuantity\Length;

// It's ok to use footses here, since the conversion doesn't happen until later
$length = new Length(4, 'footses');

// Fetch the unit of measure object that represents the 'ft' unit
$foot = $length->findUnitDefinition('ft');

// Any alias names for this unit can be added here, to make it easier to use variations
$foot->addAlias('footses');

// Now that the unit is registered, you can cast the measurement to any other measure of length
echo $length->toUnit('m'); // '1.2192'
```

And of course, if you need to add the alias permanently, you can do so in the constructor of the quantity's class.

## API Documentation
API documentation (such as it is) is handled through GitApiDoc.
- http://gitapidoc.com/api/triplepoint/php-units-of-measure

## Testing and Contributing
Pull requests are welcome, especially regarding new units of measure or new physical quantities.  However, please note that there
are many sources for conversion factors, and not all are careful to respect known precision.

In the United States, the standards body for measurement is NIST, and they've published [NIST Special Publication 1038 "The International
System of Units (SI) - Conversion factors for General Use"](http://www.nist.gov/pml/wmd/metric/upload/SP1038.pdf).  This guide
contains the approved conversion factors between various units and the base SI units.

Also note that any new physical quantities should have the appropriate SI unit chosen for their native unit of measure.

### Setting Up for Testing
After cloning this repository, install Composer:
``` bash
cd {path_to_project_root}
php -r "eval('?>'.file_get_contents('https://getcomposer.org/installer'));"
```
Since this is for development, install with the dev dependencies:

``` bash
./composer.phar install --verbose --prefer-dist --dev
```

### Continuous Integration
Continuous integration is handled through Travis-CI.
- https://travis-ci.org/triplepoint/php-units-of-measure

### Unit Tests
All the tests associated with this project can be manually run with:

``` bash
vendor/bin/phpunit -c ./tests/phpunit.xml.dist ./tests
```

### CodeSniffer
Codesniffer verifies that coding standards are being met.  Once the project is built with development dependencies, you can run the checks with:

``` bash
vendor/bin/phpcs --encoding=utf-8 --extensions=php --standard=./tests/phpcs.xml -nsp ./
```
