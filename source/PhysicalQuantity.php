<?php
namespace PhpUnitsOfMeasure;

/**
 * classes which implement this interface represent individual physical quantities.
 */
interface PhysicalQuantity
{
    /**
     * Returns the scalar value this PhysicalQuantity was initialized
     *
     * @return float
     */
    public function getValue();

    /**
     * Returns the unit of measure this PhysicalQuantity was initialized
     *
     * @return UnitOfMeasure
     */
    public function getUnit();

    /**
     * Returns a new PhysicalQuantity in the given unit of measure
     *
     * @param  UnitOfMeasureInterface|string $unit The desired unit of measure, or a string name of one
     * @return PhysicalQuantity
     */
    public function toUnit($unit);

    /**
     * Returns a new PhysicalQuantity in the quantity's native unit of measure
     *
     * @return PhysicalQuantity
     */
    public function toNativeUnit();

    /**
     * Display the value as a string, in the unit of measure this quantity was initialized with
     *
     * @return string The pretty-print version of the value, in the original unit of measure
     */
    public function __toString();

    /**
     * Add a given quantity to this quantity, and return a new quantity object.
     *
     * Note that the new quantity's original unit will be the same as this object's.
     *
     * Also note that the two quantities must represent the same physical quantity.
     *
     * @param PhysicalQuantity $quantity The quantity to add to this one
     *
     * @throws \PhpUnitsOfMeasure\Exception\PhysicalQuantityMismatch when there is a mismatch between physical quantities
     *
     * @return PhysicalQuantity the new quantity
     */
    public function add(PhysicalQuantity $quantity);

    /**
     * Subtract a given quantity from this quantity, and return a new quantity object.
     *
     * Note that the new quantity's original unit will be the same as this object's.
     *
     * Also note that the two quantities must represent the same physical quantity.
     *
     * @param PhysicalQuantity $quantity The quantity to subtract from this one
     *
     * @throws \PhpUnitsOfMeasure\Exception\PhysicalQuantityMismatch when there is a mismatch between physical quantities
     *
     * @return PhysicalQuantity the new quantity
     */
    public function subtract(PhysicalQuantity $quantity);

    /**
     * Compares this quantity with the given quantity
     *
     * @param PhysicalQuantity $quantity
     * @return bool
     */
    public function equals(PhysicalQuantity $quantity);

    /**
     * Determine whether the given PhysicalQuantityInterface object represents the same
     * physical quantity as this object.  This is used, for example, to determine if
     * two quantities can be added to or subtracted from each other.
     *
     * Note that this is not considering magnitude, and is only comparing dimensions.
     *
     * @param PhysicalQuantity $testQuantity
     *
     * @return boolean True if the quantities are the same, false if not.
     */
    public function isEquivalentQuantity(PhysicalQuantity $testQuantity);
}
