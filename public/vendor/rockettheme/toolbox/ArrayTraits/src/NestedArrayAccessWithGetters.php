<?php

namespace RocketTheme\Toolbox\ArrayTraits;

/**
 * Implements getters and setters.
 *
 * @package RocketTheme\Toolbox\ArrayTraits
 * @author RocketTheme
 * @license MIT
 */
trait NestedArrayAccessWithGetters
{
    use NestedArrayAccess;

    /**
     * Magic setter method
     *
     * @param string $offset Asset name value
     * @param mixed $value Asset value
     * @return void
     */
    #[\ReturnTypeWillChange]
    public function __set($offset, $value)
    {
        $this->offsetSet($offset, $value);
    }

    /**
     * Magic getter method
     *
     * @param string $offset Asset name value
     * @return mixed Asset value
     */
    #[\ReturnTypeWillChange]
    public function __get($offset)
    {
       return $this->offsetGet($offset);
    }

    /**
     * Magic method to determine if the attribute is set
     *
     * @param  string $offset Asset name value
     * @return bool True if the value is set
     */
    #[\ReturnTypeWillChange]
    public function __isset($offset)
    {
        return $this->offsetExists($offset);
    }

    /**
     * Magic method to unset the attribute
     *
     * @param string $offset The name value to unset
     * @return void
     */
    #[\ReturnTypeWillChange]
    public function __unset($offset)
    {
        $this->offsetUnset($offset);
    }
}
