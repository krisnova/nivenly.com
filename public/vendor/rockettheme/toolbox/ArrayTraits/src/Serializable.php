<?php

namespace RocketTheme\Toolbox\ArrayTraits;

/**
 * Implements \Serializable interface.
 *
 * @package RocketTheme\Toolbox\ArrayTraits
 * @author RocketTheme
 * @license MIT
 */
trait Serializable
{
    /**
     * Returns string representation of the object.
     *
     * @return string  Returns the string representation of the object.
     * @final
     * @deprecated Override `__serialize()` instead.
     */
    #[\ReturnTypeWillChange]
    public function serialize()
    {
        return serialize($this->__serialize());
    }

    /**
     * Called during unserialization of the object.
     *
     * @param string $serialized  The string representation of the object.
     * @return void
     * @final
     * @deprecated Override `__unserialize()` instead.
     */
    #[\ReturnTypeWillChange]
    public function unserialize($serialized)
    {
        $this->__unserialize(unserialize($serialized));
    }

    /**
     * @return array
     */
    #[\ReturnTypeWillChange]
    public function __serialize()
    {
        return $this->items;
    }

    /**
     * @param array $data
     * @return void
     */
    #[\ReturnTypeWillChange]
    public function __unserialize($data)
    {
        $this->items = $data;
    }
}
