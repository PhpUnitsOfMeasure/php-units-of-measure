# PHP Units of Measure
master: [![Build Status](https://travis-ci.org/PhpUnitsOfMeasure/php-units-of-measure.png?branch=master)](https://travis-ci.org/PhpUnitsOfMeasure/php-units-of-measure)

## Introduction
This is a PHP library for representing and converting physical units of measure.  The utility of this library is in encapsulating physical quantities in such a way that you don't have to keep track of which unit they're represented in.  For instance:

``` php
use PhpUnitsOfMeasure\PhysicalQuantity\Length;

$height = new Length(6.16, 'feet');
echo $height->toUnit('m');

// would print 1.87757, which is 6.16 feet in meters.
```

Having this abstraction allows you to create interfaces that accept physical quantities without requiring them to be in a particular unit.  For example, this function assumes the height is a float of a particular unit (presumably feet), and is therefore undesirably tied to a specific unit of measure:

``` php
// Tied to a specific unit of measure
function isTooTallToRideThisTrain( $height )
{
  return $height > 5;
}

// Calling the function requires that you first convert whatever quantity
// you have into the expected units:
isTooTallToRideThisTrain(2 / 0.3048);
```

Whereas this version using this library allows for height to be provided in whatever unit is convenient:

``` php
use PhpUnitsOfMeasure\PhysicalQuantity\Length;

// Free to operate on lengths in any unit of measure
function isTooTallToRideThisTrain( Length $height )
{
  return $height->toUnit('ft') > 5;
}

// Calling the function now allows any unit to be used:
isTooTallToRideThisTrain( new Length(2, 'm') );
```

## Installation
This library is best included in your projects via Composer.  See the [Composer website](http://getcomposer.org/) for more details, and see the [Packagist.org site for this library](https://packagist.org/packages/php-units-of-measure/php-units-of-measure).

If you'd prefer to manually include this library as a dependency in your project, then it is recommended that you use a [PSR-4](http://www.php-fig.org/psr/psr-4/) compliant PHP autoloader.  The mapping between this project's root namespace and its base directory is:
- vendor namespace 'PhpUnitsOfMeasure\' maps to the library's base directory 'source/'

See the documentation of your autoloader for further instructions.

### Project Tags and Versions
This project follows the guidelines set out in [Semantic Versioning 2.0.0](http://semver.org/spec/v2.0.0.html).  In general, versions are of the form 'X.Y.Z', and increments to X denote backward-incompatible major changes.

It is recommended that if your project includes this project as a dependency and you are using an automated dependency management tool such as [Composer](http://getcomposer.org/), then you should 'pin' the major version (X) and allow only variations in 'Y' (minor changes) and 'Z' (bugfixes).  See the documentation of your dependency manager for more details.


## Use
### Conversion
As in the examples above, the basic usage of this library is in representing physical quantities and converting between typical units of measure.  For example:

``` php
use PhpUnitsOfMeasure\PhysicalQuantity\Mass;

$quantity = new Mass(6, 'lbs');
echo $quantity->toUnit('g');
```
It's also possible to implicity cast a quantity to a string, which will display its original value:

``` php
use PhpUnitsOfMeasure\PhysicalQuantity\Mass;

$quantity = new Mass(6, 'pounds');
echo $quantity; // '6 lbs'
```

### Arithmetic Operators
There's also support for addition and subtraction.  The values of the physical quantity objects are immutable, and so these arithmetic methods return new quantity objects representing the results:

``` php
use PhpUnitsOfMeasure\PhysicalQuantity\Volume;

$first  = new Volume(6, 'liters');
$second = new Volume(6, 'cups');

$sum = $first->add($second);
echo $sum; // 7.4195292 l

$difference = $first->subtract($second);
echo $difference; // 4.5804708 l
```

### Adding new Units of Measure to Existing Quantities
Ocassionally, you will need to add a new unit of measure to a pre-existing quantity.

For example, let's say in a project you need a new measure of length, called "cubits".  You have two options: you can permanently add the new unit of measure to a new child class of the `\PhpUnitsOfMeasure\PhysicalQuantity\Length` class (or add it directly to that class and submit a pull request to get it added upstream, if appropriate), or you can add the unit temporarily at run time, inside your calling code.

#### Adding a New Unit of Measure at Runtime
To add a new unit of measure to an existing quantity at run time, you'd do this:

``` php
use PhpUnitsOfMeasure\PhysicalQuantity\Length;
use PhpUnitsOfMeasure\PhysicalQuantity\UnitOfMeasure;

// It's ok to create objects with cubits before the new unit is registered, since
// the conversion doesn't happen until an output method is called
$length = new Length(14, 'cubits');

// Build a new Unit of Measure object which represents the new unit, and which
// knows how to convert between the new unit and the quantity's native unit
// (in this case, meters).
$cubit = new UnitOfMeasure(

    // This is the official name of this unit - typically it's the standard
    // abbreviation
    'cb',

    // The second parameter is a function that converts from the native unit
    // to this unit
    function ($valueInNativeUnit) {
        return $valueInNativeUnit / 0.4572;
    },

    // The third parameter is a function that converts from this unit to the
    // native unit
    function ($valueInThisUnit) {
        return $valueInThisUnit * 0.4572;
    }
);

// Any alias names for this unit can be added here, to make it easier to use
// variations
$cubit->addAlias('cubit');
$cubit->addAlias('cubits');

// Register the new unit of measure with the quantity class
Length::addUnit($cubit);

// Now that the unit is registered, you can cast the measurement to any other
// measure of length
echo $length->toUnit('feet'); // '21'
```

##### Shorthand Factory Methods
Note that when creating instances of `UnitOfMeasure`, there are a couple of convenience static factory methods.  The first lets you instantiate units of measure which have linear scaling factors from the native unit. That is, the conversion function fits into the form `'Value in the native unit of measure' = 'Value in this unit of measure' * F`, where `F` is the scaling factor.

``` php
$megameter = UnitOfMeasure::linearUnitFactory('Mm', 1e6);
$megameter->addAlias('Megameter');
$megameter->addAlias('Megametre');
Length::addUnit($megameter);
```

The other convenience method is a special case of the above scaling factor factory method where the scaling factor is set to exactly 1, and serves as a convenient way of generating the native unit of measure.  All physical quantities must have one and only one native unit, so this method will probably only be called once per Physical Quantity class:

``` php
$meter = UnitOfMeasure::nativeUnitFactory('m');
$meter->addAlias('meter');
$meter->addAlias('metre');
Length::addUnit($meter);
```

##### Automatically Generating Metric Units
For units that use the metric system, there's a convenience trait available for classes which implement`PhysicalQuantityInterface` which will automatically generate the full continuum of metric units from a single unit.  For instance:

``` php
namespace PhpUnitsOfMeasure\PhysicalQuantity;

use PhpUnitsOfMeasure\AbstractPhysicalQuantity;
use PhpUnitsOfMeasure\UnitOfMeasure;
use PhpUnitsOfMeasure\HasSIUnitsTrait;

class Mass extends AbstractPhysicalQuantity
{
    use HasSIUnitsTrait;

    protected static $unitDefinitions;

    protected static function initialize()
    {
        // Kilogram
        $kilogram = UnitOfMeasure::nativeUnitFactory('kg');
        $kilogram->addAlias('kilogram');
        $kilogram->addAlias('kilograms');
        static::addUnit($kilogram);

        static::addMissingSIPrefixedUnits(
            $kilogram,
            1e-3,
            '%pg',
            [
                '%Pgram',
                '%Pgrams',
            ]
        );
    }
}
```

Here we're generating the native unit for mass, kilogram, adding it to the quantity as usual, and then using it to generate the spectrum of SI units by calling the `addMissingSIPrefixedUnits()` static method provided by the `HasSIUnitsTrait` trait.

Of note, the second parameter (1e-3) is denoting that while kilograms are the native unit for Mass, there's a factor of 1/1000 between the kilogram and the base metric unit of mass: the gram.  For units such as seconds or meters where the native unit for the physical quantity is also the base unit for the metric prefix system, this factor would be 1.

The 3rd and 4th parameters contain templates for the units' names and alternate aliases, respectively. The replacement strings '%p' and '%P' are used to denote the abbreviated and long-form metric prefixes.  For instance, '%pg' would generate the series `..., 'mg', 'cg', 'dg', 'g', ...`, while the template '%Pgram' would generate the series `..., 'milligram', 'centigram', 'decigram', 'gram', ...` .

#### Permanently Adding a New Unit of Measure to a Physical Quantity
The examples above for adding new units of measure to physical quantities allow you to register new units for the duration of the PHP execution, but are lost once execution terminates; it would be necessary to repeat this process every time you created a new program with `Length` measurements and wanted to use cubits.

A new unit of measure can be permanently added to a Physical Quantity class by essentially the same process as the one-time examples, only it would be done inside the initialize() method of the quantity class.  For example:

``` php
namespace PhpUnitsOfMeasure\PhysicalQuantity;

use PhpUnitsOfMeasure\AbstractPhysicalQuantity;
use PhpUnitsOfMeasure\UnitOfMeasure;

class Length extends AbstractPhysicalQuantity
{
    protected static $unitDefinitions;

    protected static function initialize()
    {
        // ...
        // ...
        // Here's all the pre-existing unit definitions for Length
        // ...
        // ...

        // Cubit
        $cubit = UnitOfMeasure::linearUnitFactory('cb', 0.4572);
        $cubit->addAlias('cubit');
        $cubit->addAlias('cubits');
        static::addUnit($cubit);
    }
}
```

Now any program which uses `Length` will start with the cubits unit already built in.  Note that here we used the more concise linear unit factory method, but the result is equivalent to the expanded form calling the `UnitOfMeasure` constructor, as used above.  Also, notice that the `static` keyword was used instead of the class name, though either would be acceptable in this case.

### Adding New Physical Quantities
[Physical quantities](http://en.wikipedia.org/wiki/Physical_quantity) are categories of measurable values, like mass, length, force, etc.

For physical quantities that are not already present in this library, it will be necessary to write a class to support a new one.  All physical quantities implement the `\PhpUnitsOfMeasure\PhysicalQuantityInterface` interface, typically extend the `\PhpUnitsOfMeasure\AbstractPhysicalQuantity` class, and typically have only an `initialize()` method which creates the quantity's units of measure.  See above for typical examples of physical quantity classes and of how to add new units to a quantity class.

Note that every physical quantity has a chosen "native unit" which is typically the SI standard.  The main point for this unit is that all of the quantity's other units of measure will convert to and from this chosen native unit.  It's important to be aware of a quantity's native unit when writing conversions for new units of measure.

### Adding new Aliases to Existing Units
It may come up that the desired unit of measure exists for a given physical quantity, but there's a missing alias for the unit.  For example, if you thought 'footses' was an obviously lacking alias for the `Length` unit 'ft', you could temporarily add the alias like this:

``` php
use PhpUnitsOfMeasure\PhysicalQuantity\Length;

// It's ok to use footses here, since the conversion doesn't happen
// until later
$length = new Length(4, 'footses');

// Fetch the unit of measure object that represents the 'ft' unit
$footUnit = Length::getUnit('ft');

// Any alias names for this unit can be added here, to make it easier
// to use variations
$footUnit->addAlias('footses');

// Now that the unit has been modified with its new alias, you can cast
// the measurement to any other measure of length
echo $length->toUnit('m'); // '1.2192'
```

And of course, if you need to add the alias permanently, you can do so in the initialize() method of the quantity's class, as shown above.

## Testing and Contributing
Pull requests are welcome, especially regarding new units of measure or new physical quantities.  However, please note that there are many sources for conversion factors, and not all are careful to respect known precision.

In the United States, the standards body for measurement is NIST, and they've published [NIST Special Publication 1038 "The International System of Units (SI) - Conversion factors for General Use"](http://www.nist.gov/pml/wmd/metric/upload/SP1038.pdf).  This guide contains the approved conversion factors between various units and the base SI units.

Also note that any new physical quantities should have the appropriate SI unit chosen for their native unit of measure.

### Pull Requests and Merging
The workflow for this repository loosely follows [gitflow](http://nvie.com/posts/a-successful-git-branching-model/) and goes as follows:
- To develop new contributions, fork or branch from the `develop` branch of the main repository
- Pull requests and contribution merges are always made to the `develop` branch of the main repository
- From time to time, `develop` is merged into `master` by a project maintainer using --no-ff, and a new tag and version are released

In this way, no feature-development work is ever directly contributed to `master`; merges to master only ever come from `develop` when a new version is being cut or from a bugfix branch, and are never fast-forward merges.  this maintains the `master` branch as a series of released production versions of the code, while `develop` is always the sum of the approved and merged contributions from developers.

End users of this repository should only use tagged commits in production.  Users interested in the current 'soon-to-be-released' code may use `develop`, with the understanding that it changes quickly.  All other existing branches (if any) should be considered 'feature' branches in development, and not yet ready for use.

### Local Testing Environment
There's a Vagrant virtual machine configuration included which is suitable for running the necessary unit tests.  To bring up the machine, make sure you have Vagrant and Virtualbox installed, and from the project root directory:


``` bash
vagrant up
vagrant ssh
cd /project
```

### Setting Up for Testing
The virtual machine development environment already has Composer installed.  Once you're ssh'ed into the virtual machine, install this project's dev dependencies:

``` bash
rm -rf vendor
composer.phar update --verbose --prefer-dist
```

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

### Continuous Integration
The above tests are automatically run against Github commits with Travis-CI.
- https://travis-ci.org/PhpUnitsOfMeasure/php-units-of-measure
