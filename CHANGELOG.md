## v1.3.0 ()
- Add support for automatically generating metric-prefixed units from a single base unit
- Throw an exception on registering units of measure with names or aliases that collide with existing units on that quantity
- Disallow values that aren't numerical and unit names that aren't strings (ie, type checking)
- Add new method getSupportedUnits() to Physical Quantities
- Add new method getAliases() to Units of Measure
- Add arcminute and arcsecond as angle units
- Add all SI prefix units to meters, kilograms, seconds, amps, kelvin, candela, pascal, bar, radians, degrees, and arcseconds

## v1.2.0 (August 16th, 2014)
- Drop support for PHP 5.3
- Moved to PSR-4 namespace convention
- Drop support for an array of names passed in the constructor as a way to specify aliases for UnitOfMeasure objects; addAlias() now required.
- Add UnitOfMeasure::nativeUnitFactory() and UnitOfMeasure::linearUnitFactory() convenience factory methods
- Add optional spelling for 'metres' and 'litres'
- Add Vagrant-based testing virtual machine, for convenience

## v1.1.2 (February 9th, 2014)
 - New units of measure on Area: hectares, international acres
 - New units of measure on Temperature: Rankin, Delisle, Newton, Réaumur, Rømer
 - Improved unit test coverage

## v1.1.1 (July 8th, 2013)
 - New physical quantity: Angle
 - Additional units of measure on Time

## v1.1.0 (May 7th, 2013)
 - Add add() and subtract() methods to physical quantities
 - toString() on quantities now shows the original unit, as expected

## v1.0.0 (May 7th, 2013)
Initial Commit
