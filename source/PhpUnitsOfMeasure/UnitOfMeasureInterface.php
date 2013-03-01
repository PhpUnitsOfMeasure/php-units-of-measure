<?php
namespace PhpUnitsOfMeasure;

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
    public function isAlias($unit);

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
