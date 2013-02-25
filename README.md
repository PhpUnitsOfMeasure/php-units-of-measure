# PHP Units of Measure
master: [![Build Status](https://travis-ci.org/triplepoint/php-units-of-measure.png?branch=master)](https://travis-ci.org/triplepoint/php-units-of-measure)

## Introduction
This is a PHP library for representing and converting physical units of measure.

## Installation
This library is best included in your projects via composer.  See the [Composer website](http://getcomposer.org/)
for more details, and see the [Packagist.org site for this library](https://packagist.org/packages/triplepoint/php-units-of-measure)

## Use
The utility of this library is in encapsulating physical quantities in such a way
that you don't have to keep track of which unit they're represented in.  For instance:

``` php
use PhpUnitsOfMeasure\Length;

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

// Calling the function requires that the input is already converted to feet
isTooTallToRideThisTrain(6);   
```

Whereas this version allows for height to be provided in whatever unit is convenient:

``` php
function isTooTallToRideThisTrain( Length $height )
{
  return $height->toUnit('ft') > 5;
}

// Calling the function now allows any unit to be used
isTooTallToRideThisTrain( new Length(2, 'm') );   
```

## API Documentation
API documentation (such as it is) is handled through GitApiDoc.
- http://gitapidoc.com/api/triplepoint/php-units-of-measure

## Testing and Contributing
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
Codesniffer verifies that coding standards are being met.  Once the project is build with development dependencies, you can run the checks with:

``` bash
vendor/bin/phpcs --encoding=utf-8 --extensions=php --standard=./tests/phpcs.xml -nsp ./
```
