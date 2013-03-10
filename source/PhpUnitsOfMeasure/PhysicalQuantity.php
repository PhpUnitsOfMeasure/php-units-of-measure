<?php
namespace PhpUnitsOfMeasure;

/**
 * This class is the parent of all the physical quantity classes, and
 * provides the infrastructure necessary for storing quantities and converting
 * then between different units of measure.
 */
abstract class PhysicalQuantity
{
    /**
     * The scalar value, in the original unit of measure.
     *
     * @var float
     */
    protected $original_value;

    /**
     * The original unit of measure's string representation.
     *
     * @var string
     */
    protected $original_unit;

    /**
     * The collection of units of measure in which this value can
     * be represented.
     *
     * @var \PhpUnitsOfMeasure\UnitOfMeasureInterface[]
     */
    protected $unit_definitions = array();

    /**
     * Store the value, after converting it to
     * the native unit of measure.
     *
     * @param float  $value The scalar value of the measurement
     * @param string $unit  The unit of measure in which this value is provided
     *
     * @return void
     */
    public function __construct($value, $unit)
    {
        $this->original_value = $value;
        $this->original_unit = $unit;
    }

    /**
     * Display the value as a string, in the native unit of measure
     *
     * @return string The pretty-print version of the value, in the native unit of measure
     */
    public function __toString()
    {
        $original_unit = $this->findUnitDefinition($this->original_unit);

        $native_unit_value = $original_unit->convertValueToNativeUnitOfMeasure($this->original_value);

        return $native_unit_value . ' ' . $original_unit->getName();
    }

    /**
     * Register a new Unit of Measure with this quantity.
     *
     * The meaning here is that this new unit of measure is one of the units to
     * which measurements of this physical quantity can be converted.
     *
     * @param \PhpUnitsOfMeasure\UnitOfMeasureInterface $unit The new unit of measure
     *
     * @return void
     */
    public function registerUnitOfMeasure(UnitOfMeasureInterface $unit)
    {
        $this->unit_definitions[] = $unit;
    }

    /**
     * Fetch the measurement, in the given unit of measure
     *
     * @param  string $unit The desired unit of measure
     *
     * @return float        The measurement cast in the requested units
     */
    public function toUnit($unit)
    {
        $original_unit = $this->findUnitDefinition($this->original_unit);
        $to_unit       = $this->findUnitDefinition($unit);

        $native_unit_value = $original_unit->convertValueToNativeUnitOfMeasure($this->original_value);
        $to_unit_value     = $to_unit->convertValueFromNativeUnitOfMeasure($native_unit_value);

        return $to_unit_value;
    }

    /**
     * Get the unit definition that matches the given unit of measure name.
     *
     * Note that this can match either the index or the aliases.
     *
     * @param  string $unit The starting unit of measure
     *
     * @throws \Exception when an unknown unit of measure is given
     *
     * @return \PhpUnitsOfMeasure\UnitOfMeasureInterface
     */
    protected function findUnitDefinition($unit)
    {
        foreach ($this->unit_definitions as $unit_of_measure) {
            if ($unit === $unit_of_measure->getName() || $unit_of_measure->isAliasOf($unit)) {
                return $unit_of_measure;
            }
        }

        throw new \Exception("Unknown unit of measure ($unit)");
    }
}
