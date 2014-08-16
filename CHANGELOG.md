## v1.2.0 (August 16th, 2014)
- Drop support for PHP 5.3
- Moved to PSR-4 namespace convention
- Drop support for an array of names passed in the constructor as a way to specify aliases for UnitOfMeasure obvjects; addAlias() now required.
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
