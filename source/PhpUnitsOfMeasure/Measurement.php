<?php
namespace PhpUnitsOfMeasure;

/**
 * This class is the parent of all the measurement classes, and
 * provides the infrastructure necessary for storing and converting
 * values.
 *
 * In order to implement a new quantity, extending classes need
 * only supply the conversion functions and native unit of measure.
 */
abstract class Measurement
{
    /**
     * Value, in the native unit of measure
     *
     * @var float
     */
    protected $value;

    /**
     * Store the value, after converting it to
     * the native unit of measure.
     *
     * @param float  $value The scalar value of the measurement
     * @param string $unit  The unit of measure that this value is provided in
     *
     * @return void
     */
    public function __construct($value, $unit)
    {
        $this->value = $this->convert($value, $unit, $this->getNativeUnitOfMeasure());
    }

    /**
     * Represent this object as a string, in the native units.
     *
     * @return string The string representation of this measurement
     */
    public function __toString()
    {
        return number_format($this->value) . ' ' . $this->getNativeUnitOfMeasure();
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
        return $this->convert($this->value, $this->getNativeUnitOfMeasure(), $unit);
    }

    /**
     * Convert the given value from one unit of measurement
     * to another.
     *
     * @param  float  $value The value
     * @param  string $from  The unit of measure in which the value is originally presented
     * @param  string $to    The unit of measure to which to cast the value
     *
     * @return float         The new scalar value, in the new units
     */
    protected function convert($value, $from, $to)
    {
        $to_native_units =   $this->getConversionFunctionToNativeUnits($from);
        $from_native_units = $this->getConversionFunctionFromNativeUnits($to);

        return $from_native_units($to_native_units($value));
    }

    /**
     * Get the transfer function that you would apply
     * in order to convert from the given unit of measure
     * to the native unit of measure.
     *
     * @param  string $unit The starting unit of measure
     *
     * @throws \Exception when a unit definition is missing the transfer function
     *
     * @return Closure The function you would apply to convert to native units
     */
    protected function getConversionFunctionToNativeUnits($unit)
    {
        $definition = $this->findUnitDefinition($unit);

        if (!array_key_exists('to_native_unit', $definition)) {
            throw new \Exception('Improper unit definition, missing conversion function to native units');
        }

        return $definition['to_native_unit'];
    }

    /**
     * Get the transfer function that you would apply
     * in order to convert from the native unit of measure tothe given units.
     *
     * @param  string $unit The ending unit of measure
     *
     * @throws \Exception when a unit definition is missing the transfer function
     *
     * @return Closure The function you would apply to convert from native units
     */
    protected function getConversionFunctionFromNativeUnits($unit)
    {
        $definition = $this->findUnitDefinition($unit);

        if (!array_key_exists('from_native_unit', $definition)) {
            throw new \Exception('Improper unit definition, missing conversion function from native units');
        }

        return $definition['from_native_unit'];
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
     * @return array the unit definition array
     */
    protected function findUnitDefinition($unit)
    {
        foreach ($this->getUnitDefinitions() as $index => $value) {
            if ($index === $unit || (array_key_exists('aliases', $value) && is_array($value['aliases']) && in_array($unit, $value['aliases']))) {
                return $value;
            }
        }

        throw new \Exception("Unknown unit of measure ($unit)");
    }

    /**
     * Get the unit of measure in which to store the internal native
     * representation.
     *
     * Note this unit must be represented in the unit definitions defined in
     * getUnitDefinitions().
     *
     * Typically, this is the SI standard unit.
     *
     * @return string the native unit of measure
     */
    abstract protected function getNativeUnitOfMeasure();

    /**
     * Return the definitions of the units of measure for this quantity, including
     * any alias names, and the conversion functions to and from the SI
     * native unit.
     *
     *
     * As an example of one element of the returned array...
     * {code}
     * $unit_definitions = array(
     *     'angstrom' => array(
     *         'aliases'          => array(),
     *         'to_native_unit'   => function ($x) { return $x * 1e-10; },
     *         'from_native_unit' => function ($x) { return $x / 1e-10; },
     *     ),
     * );
     * {code}
     *
     * The aliases element can be left out if none exist, or it can be left
     * empty.
     *
     * @return array
     */
    abstract protected function getUnitDefinitions();
}
