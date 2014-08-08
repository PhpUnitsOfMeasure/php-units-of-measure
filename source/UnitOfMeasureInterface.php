<?php
namespace PhpUnitsOfMeasure;

/**
 * Classes that implement this interface represent
 * units of measure of physical quantities.  In addition
 * to handling their names and various aliases, these
 * objects are capable of converting values to and
 * from an externally-agreed-upon native unit of measure.
 *
 * The native unit of measure can be any arbitrary
 * unit compatible wit the physical quantity to which
 * this unit of measure belongs, however all the units of measure
 * for a particular physical quantity must agree on the same
 * native unit.
 *
 * For instance, all units of measure for Length must agree
 * that the meter is the native unit to and from which all values are
 * converted.
 */
interface UnitOfMeasureInterface
{
    /**
     * Add a new alias for this unit of measure
     *
     * @param string $alias The new alias
     *
     * @return void
     */
    public function addAlias($alias);

    /**
     * Get the canonical name of this unit of measure.
     *
     * @return string The canonical naoe of this unit of measure.
     */
    public function getName();

    /**
     * Is the given unit an alias of this unit of measure?
     *
     * @param  string $unit A string representation of a potential alias of this unit of measure
     *
     * @return boolean
     */
    public function isAliasOf($unit);

    /**
     * Convert the given value from the native unit of measure to
     * this unit of measure.
     *
     * The native unit of measure can be anything, but all the
     * units of measure for a given PhysicalQuantity must agree
     * on what that unit is.
     *
     * @param  float $value The quantity to convert from this unit of measure
     *
     * @return float the new value in the native unit
     */
    public function convertValueFromNativeUnitOfMeasure($value);

    /**
     * Convert the given value from this unit of measure into the
     * native unit of measure.
     *
     * The native unit of measure can be anything, but all the
     * units of measure for a given PhysicalQuantity must agree
     * on what that unit is.
     *
     * @param  float $value The quantity to convert from the native unit of measure
     *
     * @return float the new value in this unit of measure
     */
    public function convertValueToNativeUnitOfMeasure($value);
}
