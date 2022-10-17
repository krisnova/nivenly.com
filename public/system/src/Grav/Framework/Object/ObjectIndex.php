<?php

/**
 * @package    Grav\Framework\Object
 *
 * @copyright  Copyright (c) 2015 - 2022 Trilby Media, LLC. All rights reserved.
 * @license    MIT License; see LICENSE file for details.
 */

namespace Grav\Framework\Object;

use Doctrine\Common\Collections\Criteria;
use Grav\Framework\Collection\AbstractIndexCollection;
use Grav\Framework\Object\Interfaces\NestedObjectCollectionInterface;
use Grav\Framework\Object\Interfaces\ObjectCollectionInterface;
use function get_class;
use function is_object;

/**
 * Keeps index of objects instead of collection of objects. This class allows you to keep a list of objects and load
 * them on demand. The class can be used seemingly instead of ObjectCollection when the objects haven't been loaded yet.
 *
 * This is an abstract class and has some protected abstract methods to load objects which you need to implement in
 * order to use the class.
 *
 * @template TKey of array-key
 * @template T of \Grav\Framework\Object\Interfaces\ObjectInterface
 * @template C of ObjectCollectionInterface
 * @extends AbstractIndexCollection<TKey,T,C>
 * @implements NestedObjectCollectionInterface<TKey,T>
 */
abstract class ObjectIndex extends AbstractIndexCollection implements NestedObjectCollectionInterface
{
    /** @var string */
    protected static $type;

    /** @var string */
    protected $_key;

    /**
     * @param bool $prefix
     * @return string
     */
    public function getType($prefix = true)
    {
        $type = $prefix ? $this->getTypePrefix() : '';

        if (static::$type) {
            return $type . static::$type;
        }

        $class = get_class($this);
        return $type . strtolower(substr($class, strrpos($class, '\\') + 1));
    }

    /**
     * @return string
     */
    public function getKey()
    {
        return $this->_key ?: $this->getType() . '@@' . spl_object_hash($this);
    }

    /**
     * @param string $key
     * @return $this
     */
    public function setKey($key)
    {
        $this->_key = $key;

        return $this;
    }

    /**
     * @param string $property      Object property name.
     * @return bool[]               True if property has been defined (can be null).
     */
    public function hasProperty($property)
    {
        return $this->__call('hasProperty', [$property]);
    }

    /**
     * @param string $property      Object property to be fetched.
     * @param mixed $default        Default value if property has not been set.
     * @return mixed[]             Property values.
     */
    public function getProperty($property, $default = null)
    {
        return $this->__call('getProperty', [$property, $default]);
    }

    /**
     * @param string $property      Object property to be updated.
     * @param string $value         New value.
     * @return ObjectCollectionInterface
     * @phpstan-return C
     */
    public function setProperty($property, $value)
    {
        return $this->__call('setProperty', [$property, $value]);
    }

    /**
     * @param string  $property     Object property to be defined.
     * @param mixed   $default      Default value.
     * @return ObjectCollectionInterface
     * @phpstan-return C
     */
    public function defProperty($property, $default)
    {
        return $this->__call('defProperty', [$property, $default]);
    }

    /**
     * @param string  $property     Object property to be unset.
     * @return ObjectCollectionInterface
     * @phpstan-return C
     */
    public function unsetProperty($property)
    {
        return $this->__call('unsetProperty', [$property]);
    }

    /**
     * @param string $property      Object property name.
     * @param string|null $separator     Separator, defaults to '.'
     * @return bool[]               True if property has been defined (can be null).
     */
    public function hasNestedProperty($property, $separator = null)
    {
        return $this->__call('hasNestedProperty', [$property, $separator]);
    }

    /**
     * @param string $property      Object property to be fetched.
     * @param mixed  $default       Default value if property has not been set.
     * @param string|null $separator     Separator, defaults to '.'
     * @return mixed[]              Property values.
     */
    public function getNestedProperty($property, $default = null, $separator = null)
    {
        return $this->__call('getNestedProperty', [$property, $default, $separator]);
    }

    /**
     * @param string $property      Object property to be updated.
     * @param mixed  $value         New value.
     * @param string|null $separator     Separator, defaults to '.'
     * @return ObjectCollectionInterface
     * @phpstan-return C
     */
    public function setNestedProperty($property, $value, $separator = null)
    {
        return $this->__call('setNestedProperty', [$property, $value, $separator]);
    }

    /**
     * @param string  $property     Object property to be defined.
     * @param mixed   $default      Default value.
     * @param string|null  $separator    Separator, defaults to '.'
     * @return ObjectCollectionInterface
     * @phpstan-return C
     */
    public function defNestedProperty($property, $default, $separator = null)
    {
        return $this->__call('defNestedProperty', [$property, $default, $separator]);
    }

    /**
     * @param string  $property     Object property to be unset.
     * @param string|null  $separator    Separator, defaults to '.'
     * @return ObjectCollectionInterface
     * @phpstan-return C
     */
    public function unsetNestedProperty($property, $separator = null)
    {
        return $this->__call('unsetNestedProperty', [$property, $separator]);
    }

    /**
     * Create a copy from this collection by cloning all objects in the collection.
     *
     * @return static
     * @return static<TKey,T,C>
     */
    public function copy()
    {
        $list = [];
        foreach ($this->getIterator() as $key => $value) {
            /** @phpstan-ignore-next-line */
            $list[$key] = is_object($value) ? clone $value : $value;
        }

        /** @phpstan-var static<TKey,T,C> */
        return $this->createFrom($list);
    }

    /**
     * @return array
     */
    public function getObjectKeys()
    {
        return $this->getKeys();
    }

    /**
     * @param array $ordering
     * @return ObjectCollectionInterface
     * @phpstan-return C
     */
    public function orderBy(array $ordering)
    {
        return $this->__call('orderBy', [$ordering]);
    }

    /**
     * @param string $method
     * @param array $arguments
     * @return array|mixed
     */
    public function call($method, array $arguments = [])
    {
        return $this->__call('call', [$method, $arguments]);
    }

    /**
     * Group items in the collection by a field and return them as associated array.
     *
     * @param string $property
     * @return array
     */
    public function group($property)
    {
        return $this->__call('group', [$property]);
    }

    /**
     * Group items in the collection by a field and return them as associated array of collections.
     *
     * @param string $property
     * @return ObjectCollectionInterface[]
     * @phpstan-return C[]
     */
    public function collectionGroup($property)
    {
        return $this->__call('collectionGroup', [$property]);
    }

    /**
     * @param Criteria $criteria
     * @return ObjectCollectionInterface
     * @phpstan-return C
     */
    public function matching(Criteria $criteria)
    {
        $collection = $this->loadCollection($this->getEntries());

        /** @phpstan-var C $matching */
        $matching = $collection->matching($criteria);

        return $matching;
    }

    /**
     * @param string $name
     * @param array $arguments
     * @return mixed
     */
    #[\ReturnTypeWillChange]
    abstract public function __call($name, $arguments);

    /**
     * @return string
     */
    protected function getTypePrefix()
    {
        return '';
    }
}
