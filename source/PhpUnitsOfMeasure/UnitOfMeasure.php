<?php
namespace PhpUnitsOfMeasure;

/**
 * This implementation of UnitOfMeasureInterface uses
 * a pair of anonymous functions to cast values to and from
 * the native unit of measure, respectively.
 */
class UnitOfMeasure implements UnitOfMeasureInterface
{
    /**
     * The canonical name for this unit of measure.
     *
     * Typically this is the official way the unit is abbreviated.
     *
     * @var string
     */
    protected $name;

    /**
     * A collection of alias names that map to this unit of measure
     *
     * @var string[]
     */
    protected $aliases = array();

    /**
     * A callable that can convert a value in this quantity's
     * native unit to this unit of measure.
     *
     * @var callable
     */
    protected $fromNativeUnit;

    /**
     * A callable that can convert a value in this unit of measure
     * to a value in the native unit of the physical quantity.
     *
     * @var callable
     */
    protected $toNativeUnit;

    /**
     * Configure this object's mandatory properties.
     *
     * @param string   $name           This unit of measure's canonical name
     * @param callable $fromNativeUnit The callable that can cast values into this unit of measure from the native unit of measure
     * @param callable $toNativeUnit   The callable that can cast values into the native unit from this unit of measure
     * @param array    $aliases
     *
     * @return void
     */
    public function __construct($name, $fromNativeUnit, $toNativeUnit, $aliases = array())
    {
        $this->name           = $name;
        $this->fromNativeUnit = $fromNativeUnit;
        $this->toNativeUnit   = $toNativeUnit;
        $this->aliases        = $aliases;
    }

    /**
     * @see \PhpUnitsOfMeasure\UnitOfMeasureInterface::addAlias
     */
    public function addAlias($alias)
    {
        $this->aliases[] = $alias;
    }

    /**
     * @see \PhpUnitsOfMeasure\UnitOfMeasureInterface::getName
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @see \PhpUnitsOfMeasure\UnitOfMeasureInterface::isAliasOf
     */
    public function isAliasOf($unit)
    {
        return in_array($unit, $this->aliases);
    }

    /**
     * @see \PhpUnitsOfMeasure\UnitOfMeasureInterface::convertValueFromNativeUnitOfMeasure
     */
    public function convertValueFromNativeUnitOfMeasure($value)
    {
        $callable = $this->fromNativeUnit;
        return $callable($value);
    }

    /**
     * @see \PhpUnitsOfMeasure\UnitOfMeasureInterface::convertValueToNativeUnitOfMeasure
     */
    public function convertValueToNativeUnitOfMeasure($value)
    {
        $callable = $this->toNativeUnit;
        return $callable($value);
    }
}
