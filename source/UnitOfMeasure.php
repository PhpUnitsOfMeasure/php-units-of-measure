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
    protected $aliases = [];

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
     * For the special case of units that have a linear conversion factor, this factory
     * method simplifies the construction of the unit of measure.
     *
     * For example the relationship between meters and feet is a simple multiplicative factor of
     * 0.3048 meters in a foot.  Converting back and forth between these two units is a mater of
     * multiplication or division by this scaling factor.
     *
     * In constrast, converting Celsius to Fahrenheit involves an offset calculation, and cannot
     * be represented by a simple conversion factor.  In such cases this class's constructor should be
     * invoked directly.
     *
     * To help in getting the multiplication and division right, think of the toNativeUnitFactor
     * as the number you'd multiply this unit by to get to the native unit of measure.  In
     * other words:
     * 'Value in the native unit of measure' = 'Value in this unit of measure' * toNativeUnitFactor
     *
     * @param string $name               This unit of measure's canonical name
     * @param float  $toNativeUnitFactor The factor to scale the unit by where factor * base unit = this unit
     *
     * @return void
     */
    public static function linearUnitFactory($name, $toNativeUnitFactor)
    {
        return new static(
            $name,
            function ($valueInNativeUnit) use ($toNativeUnitFactor) {
                return $valueInNativeUnit / $toNativeUnitFactor;
            },
            function ($valueInThisUnit) use ($toNativeUnitFactor) {
                return $valueInThisUnit * $toNativeUnitFactor;
            }
        );
    }

    /**
     * This is a special case of the linear unit factory above, for use in generating the native unit of measure
     * for a given physical quantity.  By definition, the conversion factor is 1.
     *
     * @param string $name This unit of measure's canonical name
     *
     * @return void
     */
    public static function nativeUnitFactory($name)
    {
        return static::linearUnitFactory($name, 1);
    }

    /**
     * Configure this object's mandatory properties.
     *
     * @param string   $name           This unit of measure's canonical name
     * @param callable $fromNativeUnit The callable that can cast values into this unit of measure from the native unit of measure
     * @param callable $toNativeUnit   The callable that can cast values into the native unit from this unit of measure
     *
     * @return void
     */
    public function __construct($name, callable $fromNativeUnit, callable $toNativeUnit)
    {
        $this->name           = $name;
        $this->fromNativeUnit = $fromNativeUnit;
        $this->toNativeUnit   = $toNativeUnit;
    }

    /**
     * @see \PhpUnitsOfMeasure\UnitOfMeasureInterface::getName
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @see \PhpUnitsOfMeasure\UnitOfMeasureInterface::addAlias
     */
    public function addAlias($alias)
    {
        $this->aliases[] = $alias;
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
