<?php
namespace PhpUnitsOfMeasure;

abstract class AbstractPhysicalQuantity implements PhysicalQuantityInterface
{
    /**
     * The collection of units in which this quantity can be represented.
     *
     * Commented out to ensure that each child class defines its own instance of this static.
     *
     * @var UnitOfMeasureInterface[]
     */
    // protected static $unitDefinitions;

    /**
     * Register a new unit of measure for all instances of this this physical quantity.
     *
     * @throws Exception\DuplicateUnitNameOrAlias If the unit name or any alias already exists
     *
     * @param UnitOfMeasureInterface $unit The new unit of measure
     */
    public static function addUnit(UnitOfMeasureInterface $unit)
    {
        if (static::unitNameOrAliasesAlreadyRegistered($unit)) {
            throw new Exception\DuplicateUnitNameOrAlias([
                ':labels' => implode(', ', array_merge([$unit->getName()], $unit->getAliases()))
            ]);
        }

        static::$unitDefinitions[] = $unit;
    }

    /**
     * Get the unit of measure that matches the given name by either name or alias.
     *
     * @param string $unit A name or alias by which the unit is known.
     *
     * @throws Exception\UnknownUnitOfMeasure when an unknown unit of measure is given
     *
     * @return UnitOfMeasureInterface
     */
    public static function getUnit($unit)
    {
        // If this class hasn't been initialized yet, do so now
        if (!is_array(static::$unitDefinitions)) {
            static::$unitDefinitions = [];
            static::initialize();
        }

        foreach (static::$unitDefinitions as $unitOfMeasure) {
            if ($unit === $unitOfMeasure->getName() || $unitOfMeasure->isAliasOf($unit)) {
                return $unitOfMeasure;
            }
        }

        throw new Exception\UnknownUnitOfMeasure([':unit' => $unit]);
    }

    /**
     * Given a unit of measure, determine if its name or any of its aliases conflict
     * with the set of already-known unit names and aliases.
     *
     * @param UnitOfMeasureInterface $unit The unit in question
     *
     * @return boolean true if there is a conflict, false if there is not
     */
    protected static function unitNameOrAliasesAlreadyRegistered(UnitOfMeasureInterface $unit)
    {
        // If this class hasn't been initialized yet, do so now
        if (!is_array(static::$unitDefinitions)) {
            static::$unitDefinitions = [];
            static::initialize();
        }

        $currentUnitNamesAndAliases = [];
        foreach (static::$unitDefinitions as $unitOfMeasure) {
            $currentUnitNamesAndAliases[] = $unitOfMeasure->getName();
            $currentUnitNamesAndAliases = array_merge($currentUnitNamesAndAliases, $unitOfMeasure->getAliases());
        }

        $newUnitNamesAndAliases = array_merge([$unit->getName()], $unit->getAliases());

        return count(array_intersect($currentUnitNamesAndAliases, $newUnitNamesAndAliases)) > 0;
    }

    /**
     * Initialize the static properties of this quantity class, such as the set of
     * default units of measure.
     */
    protected static function initialize()
    {
    }


    /**
     * The scalar value, in the original unit of measure.
     *
     * @var float
     */
    protected $originalValue;

    /**
     * The original unit of measure's string representation.
     *
     * @var string
     */
    protected $originalUnit;

    /**
     * Store the value and its original unit.
     *
     * @param float  $value The scalar value of the measurement
     * @param string $unit  The unit of measure in which this value is provided
     *
     * @throws Exception\NonNumericValue If the value is not numeric
     * @throws Exception\NonStringUnitName If the unit is not a string
     */
    public function __construct($value, $unit)
    {
        if (!is_numeric($value)) {
            throw new Exception\NonNumericValue([':value' => $value]);
        }

        if (!is_string($unit)) {
            throw new Exception\NonStringUnitName([':name' => $unit]);
        }

        $this->originalValue = $value;
        $this->originalUnit  = $unit;
    }

    /**
     * @see \PhpUnitsOfMeasure\PhysicalQuantityInterface::toUnit
     */
    public function toUnit($toUnit)
    {
        return $this->toUnitOfMeasure(static::getUnit($toUnit));
    }

    /**
     * Convert this quantity to the given unit of measure.
     *
     * @param UnitOfMeasureInterface $unit The object representing the target unit of measure.
     *
     * @return float This quantity's value in the given unit of measure.
     */
    private function toUnitOfMeasure(UnitOfMeasureInterface $unit)
    {
        $thisValueInNativeUnit = $this->toNativeUnit();
        return $unit->convertValueFromNativeUnitOfMeasure($thisValueInNativeUnit);
    }

    /**
     * @see \PhpUnitsOfMeasure\PhysicalQuantityInterface::toNativeUnit
     */
    public function toNativeUnit()
    {
        return static::getUnit($this->originalUnit)
            ->convertValueToNativeUnitOfMeasure($this->originalValue);
    }

    /**
     * @see \PhpUnitsOfMeasure\PhysicalQuantityInterface::__toString
     */
    public function __toString()
    {
        return trim($this->originalValue . ' ' . static::getUnit($this->originalUnit)->getName());
    }

    /**
     * @see \PhpUnitsOfMeasure\PhysicalQuantityInterface::add
     */
    public function add(PhysicalQuantityInterface $quantity)
    {
        if (!$this->isEquivalentQuantity($quantity)) {
            throw new Exception\PhysicalQuantityMismatch([
                ':lhs' => (string) $this,
                ':rhs' => (string) $quantity
            ]);
        }

        $quantityValueInThisOriginalUnit = $quantity->toUnitOfMeasure(static::getUnit($this->originalUnit));
        $newValue = $this->originalValue + $quantityValueInThisOriginalUnit;

        return new static($newValue, static::getUnit($this->originalUnit)->getName());
    }

    /**
     * @see \PhpUnitsOfMeasure\PhysicalQuantityInterface::subtract
     */
    public function subtract(PhysicalQuantityInterface $quantity)
    {
        if (!$this->isEquivalentQuantity($quantity)) {
            throw new Exception\PhysicalQuantityMismatch([
                ':lhs' => (string) $this,
                ':rhs' => (string) $quantity
            ]);
        }

        $quantityValueInThisOriginalUnit = $quantity->toUnitOfMeasure(static::getUnit($this->originalUnit));
        $newValue = $this->originalValue - $quantityValueInThisOriginalUnit;

        return new static($newValue, static::getUnit($this->originalUnit)->getName());
    }

    /**
     * @see \PhpUnitsOfMeasure\PhysicalQuantityInterface::isEquivalentQuantity
     */
    public function isEquivalentQuantity(PhysicalQuantityInterface $testQuantity)
    {
        return get_class($this) === get_class($testQuantity);
    }


    /**
     * Get the unit definition array
     * @return Array $unitDefinitions
     */
    public static function getUnitDefinitions() {
        if (!is_array(static::$unitDefinitions)) {
            static::$unitDefinitions = [];
            static::initialize();
        }

        return static::$unitDefinitions;
    }
}
