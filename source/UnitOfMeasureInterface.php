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
 * unit compatible with the physical quantity to which
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
     * Get the canonical name of this unit of measure.
     *
     * @return string The canonical name of this unit of measure.
     */
    public function getName();

    /**
     * Add a new alias for this unit of measure
     *
     * @param string $alias The new alias
     *
     * @throws \PhpUnitsOfMeasure\Exception\NonStringUnitName If The alias name is not a string.
     */
    public function addAlias($alias);

    /**
     * Get the list of alternate names for this unit
     *
     * @return string[] The collection of aliases
     */
    public function getAliases();

    /**
     * Is the given unit an alias of this unit of measure?
     *
     * @param  string $unit A string representation of a potential alias of this unit of measure
     *
     * @throws \PhpUnitsOfMeasure\Exception\NonStringUnitName If The unit name is not a string.
     *
     * @return boolean
     */
    public function isAliasOf($unit);

    /**
     * Convert the given value from the native unit of measure to
     * this unit of measure.
     *
     * The native unit of measure can be anything, but all the
     * units of measure for a given physical quantity must agree
     * on what that unit is.
     *
     * @param  float $value The quantity to convert from this unit of measure
     *
     * @throws \PhpUnitsOfMeasure\Exception\NonNumericValue If The value is not numeric.
     *
     * @return float the new value in the native unit
     */
    public function convertValueFromNativeUnitOfMeasure($value);

    /**
     * Convert the given value from this unit of measure into the
     * native unit of measure.
     *
     * The native unit of measure can be anything, but all the
     * units of measure for a given physical quantity must agree
     * on what that unit is.
     *
     * @param  float $value The quantity to convert from the native unit of measure
     *
     * @throws \PhpUnitsOfMeasure\Exception\NonNumericValue If The value is not numeric.
     *
     * @return float the new value in this unit of measure
     */
    public function convertValueToNativeUnitOfMeasure($value);


    /**
     * Returns true if this UnitOfMeasure is the native unit
     *
     * @return bool
     */
    public function isNativeUnit();


    /**
     * Display the unit as a string, in the native unit of measure
     *
     * @return string
     */
    public function __toString();
}
