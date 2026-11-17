# PHP Units of Measure
master: [![Build Status](https://github.com/stupalov/php-units-of-measure/actions/workflows/ci.yaml/badge.svg?branch=master)](https://github.com/stupalov/php-units-of-measure/actions/workflows/ci.yaml)

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

## Requirements
- PHP 7.4 or newer (tested on PHP 7.4 – 8.5)

## Installation
This library is best included in your projects via Composer.  See the [Composer website](https://getcomposer.org/) for more details, and see the [Packagist.org site for this library](https://packagist.org/packages/php-units-of-measure/php-units-of-measure).

If you'd prefer to manually include this library as a dependency in your project, then it is recommended that you use a [PSR-4](https://www.php-fig.org/psr/psr-4/) compliant PHP autoloader.  The mapping between this project's root namespace and its base directory is:
- vendor namespace 'PhpUnitsOfMeasure\' maps to the library's base directory 'source/'

See the documentation of your autoloader for further instructions.

### Project Tags and Versions
This project follows the guidelines set out in [Semantic Versioning 2.0.0](https://semver.org/spec/v2.0.0.html).  In general, versions are of the form 'X.Y.Z', and increments to X denote backward-incompatible major changes.

It is recommended that if your project includes this project as a dependency and you are using an automated dependency management tool such as [Composer](https://getcomposer.org/), then you should 'pin' the major version (X) and allow only variations in 'Y' (minor changes) and 'Z' (bugfixes).  See the documentation of your dependency manager for more details.


## Supported Physical Quantities
All classes live in the `PhpUnitsOfMeasure\PhysicalQuantity` namespace. Every quantity has a native unit; all other units convert to and from it.

| Class | Native unit | Prefixes | Other units (names; many aliases are also accepted) |
|---|---|---|---|
| `Acceleration` | `m/s^2` | SI | – |
| `Angle` | `rad` | SI (`rad`, `deg`, `arcsec`) | `deg`, `arcmin`, `arcsec` |
| `Area` | `m^2` | SI, squared (`km^2` = 10⁶ m²) | `ft^2`, `in^2`, `mi^2`, `yd^2`, `a`, `daa`, `ha`, `ac` |
| `ElectricCurrent` | `A` | SI | – |
| `Energy` | `J` | SI (`J`, `eV`, `Wh`, `cal`) | `eV`, `Wh`, `cal` |
| `Length` | `m` | SI (`m`, `pc`) | `ft`, `in`, `mi`, `yd`, `M` (nautical mile), `mil` (Scandinavian), `AU`, `ly`, `pc` |
| `LuminousIntensity` | `cd` | SI | – |
| `Mass` | `g` | SI (`g`, `t`) | `t`, `gr`, `lb`, `oz`, `st`, `cwt`, `ust`, `ukt`, `picul` |
| `Power` | `W` | SI | `dBm` |
| `Pressure` | `Pa` | SI (`Pa`, `bar`) | `atm`, `at`, `torr`, `bar`, `inHg`, `mmHg`, `psi`, `ksi`, `Mpsi` |
| `Quantity` | `mol` | SI | – |
| `SolidAngle` | `sr` | SI | – |
| `Storage` | `bit` | IEC + SI (`bit`, `byte`) | `byte` |
| `Temperature` | `K` | SI | `°C`, `°F`, `°Ra`, `°De`, `°N`, `°Ré`, `°Rø` |
| `Time` | `s` | SI | `m` (minute), `h`, `d`, `w`, `yr`, `jyr`, `decade`, `century`, `millennium` |
| `Velocity` | `m/s` | SI (`m/s`, `m/min`, `m/h`) | `ft/s`, `ft/min`, `mps`, `mph`, `kn`, `mach` |
| `Volume` | `m^3` | SI, cubed (`cm^3` = 10⁻⁶ m³), and on `l` | `ft^3`, `in^3`, `yd^3`, `l`, `cup`, `tsp`, `tbsp`, `gal`, `imp gal`, `qt`, `fl oz`, `pt` |
| `VolumeFlow` | `m^3/s` | SI, cubed (`m^3/s`), and on `l/s` | `m^3/min`, `m^3/h`, `l/min`, `l/h`, `ft^3/s`, `ft^3/min`, `ft^3/h`, `gal/s`, `gal/min`, `gal/h`, `gal/d` |

The full list of units and aliases of a quantity is available at runtime:

``` php
use PhpUnitsOfMeasure\PhysicalQuantity\Pressure;

print_r(Pressure::listAllUnits()); // ['Pa' => ['pascal', 'pascals'], 'QPa' => ['quettapascal', 'quettapascals'], ...]
var_dump(Pressure::isUnitDefined('mmHg')); // true
```

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

### Original Value and Unit
The value and unit the quantity was created with are available via getters:

``` php
use PhpUnitsOfMeasure\PhysicalQuantity\Length;

$length = new Length(6.16, 'feet');
echo $length->getOriginalValue(); // 6.16
echo $length->getOriginalUnit();  // 'feet'
```

### Metric (SI) Prefixes
Units marked "SI" in the table above are available with every SI prefix, both in the short (`k` + `Pa` = `kPa`) and long form (`kilo` + `pascal` = `kilopascal`):

| Prefix | Symbol | Factor | | Prefix | Symbol | Factor |
|---|---|---|---|---|---|---|
| quetta | `Q` | 10³⁰ | | deci | `d` | 10⁻¹ |
| ronna | `R` | 10²⁷ | | centi | `c` | 10⁻² |
| yotta | `Y` | 10²⁴ | | milli | `m` | 10⁻³ |
| zetta | `Z` | 10²¹ | | micro | `µ` | 10⁻⁶ |
| exa | `E` | 10¹⁸ | | nano | `n` | 10⁻⁹ |
| peta | `P` | 10¹⁵ | | pico | `p` | 10⁻¹² |
| tera | `T` | 10¹² | | femto | `f` | 10⁻¹⁵ |
| giga | `G` | 10⁹ | | atto | `a` | 10⁻¹⁸ |
| mega | `M` | 10⁶ | | zepto | `z` | 10⁻²¹ |
| kilo | `k` | 10³ | | yocto | `y` | 10⁻²⁴ |
| hecto | `h` | 10² | | | | |
| deca | `da` | 10¹ | | | | |

For squared and cubic units the prefix is raised to the same power, as expected:

``` php
use PhpUnitsOfMeasure\PhysicalQuantity\Area;
use PhpUnitsOfMeasure\PhysicalQuantity\Volume;
use PhpUnitsOfMeasure\PhysicalQuantity\Pressure;

echo (new Pressure(1, 'atm'))->toUnit('kPa');            // 101.325
echo (new Area(1, 'km^2'))->toUnit('m^2');               // 1000000
echo (new Volume(1, 'cubic decimeter'))->toUnit('l');    // 1
echo (new Volume(250, 'ml'))->toUnit('cl');              // 25
```

Where a prefixed name would collide with an already defined unit, the explicitly defined unit wins (for example `m` in `Time` is the minute, not a milli-something, and `Mass` has `ft` for femtotonne).

### Binary (IEC) Prefixes for Storage
`Storage` has two series of units, based on `bit` and on `byte` (`1 byte = 8 bit`):

- Binary IEC prefixes are always powers of 1024: `Ki` (kibi, 2¹⁰), `Mi` (mebi, 2²⁰), `Gi`, `Ti`, `Pi`, `Ei`, `Zi`, `Yi` (yobi, 2⁸⁰).
- SI prefixes from `k` to `Q` are also available, but their meaning differs between the series:
  - for **bits** they are decimal: `kilobit` = 1000 bit;
  - for **bytes** they follow the common binary convention: `kilobyte` / `kB` = 1024 byte, `MB` = 1024² byte, and so on.
- Only multiples are defined, there are no sub-multiples (no `millibit`).
- Unit names are the long forms (`kilobit`, `mebibyte`). Short aliases: `kb`, `Mib` for bits; `kB`, `MiB`, `kByte`, `MiBytes` for bytes. Short aliases are case-sensitive: `kb` is a kilobit, `kB` is a kilobyte.

``` php
use PhpUnitsOfMeasure\PhysicalQuantity\Storage;

echo (new Storage(1, 'KiB'))->toUnit('B');     // 1024
echo (new Storage(1, 'kB'))->toUnit('B');      // 1024
echo (new Storage(1, 'kb'))->toUnit('bit');    // 1000
echo (new Storage(1, 'GiB'))->toUnit('Mib');   // 8192
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

The 3rd and 4th parameters contain templates for the units' names and alternate aliases, respectively. The replacement strings are:
- `%p` – the abbreviated prefix (`k`, `M`, `µ`, ...);
- `%P` – the long-form prefix (`kilo`, `mega`, `micro`, ...);
- `%U` – the long-form prefix in upper case (`KILO`, `MEGA`, ...).

For instance, '%pg' would generate the series `..., 'mg', 'cg', 'dg', 'g', ...`, while the template '%Pgram' would generate the series `..., 'milligram', 'centigram', 'decigram', 'gram', ...` .

The optional 5th parameter is a power factor for squared, cubic and other powered units. With a power factor of 2, each prefix factor is squared (`km^2` = (10³)² m²):

``` php
// Inside Area::initialize()
$metersquared = UnitOfMeasure::nativeUnitFactory('m^2');
static::addUnit($metersquared);

static::addMissingSIPrefixedUnits(
    $metersquared,
    1,
    '%pm^2',
    [
        '%pm²',
        'square %Pmeter',
    ],
    2 // square power factor
);
```

Units that are already registered (by name or by any alias) are never overwritten: a generated unit is skipped if its name or one of its aliases is already in use. So any unit with an explicit, non-standard definition should be added before calling `addMissingSIPrefixedUnits()`.

##### Automatically Generating Binary (IEC) Units
Similarly, the `HasIECUnitsTrait` trait provides `addMissingIECPrefixedUnits()`, which generates the binary prefixes (`Ki` ... `Yi`, powers of 1024) and the decimal multiples (`k` ... `Q`) from a single unit. It takes the same first four parameters and patterns as the SI method. The optional 5th parameter is the base used for the decimal multiples: by default they are powers of 1000, with `1024` they are powers of 1024 (as for bytes in `Storage`):

``` php
namespace PhpUnitsOfMeasure\PhysicalQuantity;

use PhpUnitsOfMeasure\AbstractPhysicalQuantity;
use PhpUnitsOfMeasure\UnitOfMeasure;
use PhpUnitsOfMeasure\HasIECUnitsTrait;

class Storage extends AbstractPhysicalQuantity
{
    use HasIECUnitsTrait;

    protected static $unitDefinitions;

    protected static function initialize()
    {
        $bit = UnitOfMeasure::nativeUnitFactory('bit');
        $bit->addAlias('b');
        static::addUnit($bit);

        // kilobit = 1000 bit, kibibit = 1024 bit
        static::addMissingIECPrefixedUnits($bit, 1, '%Pbit', ['%pb', '%Pbits']);

        $byte = UnitOfMeasure::linearUnitFactory('byte', 8);
        $byte->addAlias('B');
        static::addUnit($byte);

        // kilobyte = kibibyte = 1024 byte
        static::addMissingIECPrefixedUnits($byte, 1, '%Pbyte', ['%Pbytes', '%pB'], 1024);
    }
}
```

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
[Physical quantities](https://en.wikipedia.org/wiki/Physical_quantity) are categories of measurable values, like mass, length, force, etc.

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
The workflow for this repository goes as follows:
- To develop new contributions, fork or branch from the `master` branch of the main repository
- Pull requests and contribution merges are always made to the `master` branch of the main repository
- From time to time, commits of `master` are tagged and a new version is released
- To release, add a `## vX.Y.Z (date)` section to `CHANGELOG.md` on `master`, then run the *Release* workflow (Actions → Release → Run workflow) with the version `vX.Y.Z`: it creates the tag and the GitHub release with the notes from that section
- At present, there is no support for maintaining bug-fix branches of older project versions.  This is something we can revisit if a need arises.

End users of this repository should only use tagged commits in production.  Users interested in the current 'soon-to-be-released' code may use `master`, with the understanding that it may change unexpectedly.  All other existing branches (if any) should be considered 'feature' branches in development, and not yet ready for use.

### Setting Up for Testing
You need PHP 7.4+ and Composer. Install this project's dev dependencies:

``` bash
composer install --prefer-dist
```

There's also a Vagrant virtual machine configuration included (`vagrant up`, `vagrant ssh`, `cd /project`), if you prefer an isolated environment.

### Unit Tests
All the tests associated with this project can be manually run with:

``` bash
composer test
```

### CodeSniffer
Codesniffer verifies that coding standards are being met.  Once the project is built with development dependencies, you can run the checks with:

``` bash
composer phpcs
```

### Continuous Integration
The above tests and CodeSniffer checks are automatically run with GitHub Actions on every push and pull request, against PHP 7.4 – 8.5 (see `.github/workflows/ci.yaml`).
