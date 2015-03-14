<?php
namespace PhpUnitsOfMeasure;

/**
 * classes which implement this interface represent individual physical quantities.
 */
interface PhysicalQuantityInterface
{
    /**
     * Fetch the measurement, in the given unit of measure
     *
     * @param  UnitOfMeasureInterface|string $unit The desired unit of measure, or a string name of one
     *
     * @return float The measurement cast in the requested units
     */
    public function toUnit($unit);

    /**
     * Fetch the measurement in the quantity's native unit of measure
     *
     * @return float the measurement cast to the native unit of measurement
     */
    public function toNativeUnit();

    /**
     * Display the value as a string, in the original unit of measure
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
     * @param PhysicalQuantityInterface $quantity The quantity to add to this one
     *
     * @throws \PhpUnitsOfMeasure\Exception\PhysicalQuantityMismatch when there is a mismatch between physical quantities
     *
     * @return PhysicalQuantityInterface the new quantity
     */
    public function add(PhysicalQuantityInterface $quantity);

    /**
     * Subtract a given quantity from this quantity, and return a new quantity object.
     *
     * Note that the new quantity's original unit will be the same as this object's.
     *
     * Also note that the two quantities must represent the same physical quantity.
     *
     * @param PhysicalQuantityInterface $quantity The quantity to subtract from this one
     *
     * @throws \PhpUnitsOfMeasure\Exception\PhysicalQuantityMismatch when there is a mismatch between physical quantities
     *
     * @return PhysicalQuantityInterface the new quantity
     */
    public function subtract(PhysicalQuantityInterface $quantity);

    /**
     * Determine whether the given PhysicalQuantityInterface object represents the same
     * physical quantity as this object.  This is used, for example, to determine if
     * two quantities can be added to or subtracted from each other.
     *
     * Note that this is not considering magnitude, and is only comparing dimensions.
     *
     * @param PhysicalQuantityInterface $testQuantity
     *
     * @return boolean True if the quantities are the same, false if not.
     */
    public function isEquivalentQuantity(PhysicalQuantityInterface $testQuantity);
}
