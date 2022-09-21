<?php

namespace RocketTheme\Toolbox\ArrayTraits;

use function is_array;
use function is_object;

/**
 * Implements nested ArrayAccess interface with dot notation.
 *
 * @package RocketTheme\Toolbox\ArrayTraits
 * @author RocketTheme
 * @license MIT
 */
trait NestedArrayAccess
{
    /**
     * @var string
     * @phpstan-var non-empty-string
     */
    protected $nestedSeparator = '.';

    /**
     * Get value by using dot notation for nested arrays/objects.
     *
     * @example $value = $this->get('this.is.my.nested.variable');
     *
     * @param string $name Dot separated path to the requested value.
     * @param mixed $default Default value (or null).
     * @param string|null $separator Separator, defaults to '.'
     * @return mixed Value.
     */
    public function get($name, $default = null, $separator = null)
    {
        $current = $this->items;
        if ($name === '') {
            return $current;
        }

        $path = explode($separator ?: $this->nestedSeparator, $name);

        foreach ($path as $field) {
            if (is_object($current) && isset($current->{$field})) {
                $current = $current->{$field};
            } elseif (is_array($current) && isset($current[$field])) {
                $current = $current[$field];
            } else {
                return $default;
            }
        }

        return $current;
    }

    /**
     * Set value by using dot notation for nested arrays/objects.
     *
     * @example $data->set('this.is.my.nested.variable', $value);
     *
     * @param string $name Dot separated path to the requested value.
     * @param mixed $value New value.
     * @param string|null $separator Separator, defaults to '.'
     * @return $this
     */
    public function set($name, $value, $separator = null)
    {
        $path = $name !== '' ? explode($separator ?: $this->nestedSeparator, $name) : [];
        $current = &$this->items;

        foreach ($path as $field) {
            if (is_object($current)) {
                // Handle objects.
                if (!isset($current->{$field})) {
                    $current->{$field} = [];
                }
                $current = &$current->{$field};
            } else {
                // Handle arrays and scalars.
                if (!is_array($current)) {
                    $current = [$field => []];
                } elseif (!isset($current[$field])) {
                    $current[$field] = [];
                }
                $current = &$current[$field];
            }
        }

        $current = $value;

        return $this;
    }

    /**
     * Unset value by using dot notation for nested arrays/objects.
     *
     * @example $data->undef('this.is.my.nested.variable');
     *
     * @param string $name Dot separated path to the requested value.
     * @param string|null $separator Separator, defaults to '.'
     * @return $this
     */
    public function undef($name, $separator = null)
    {
        // Handle empty string.
        if ($name === '') {
            $this->items = [];

            return $this;
        }

        $path = explode($separator ?: $this->nestedSeparator, $name);

        $var = array_pop($path);
        $current = &$this->items;

        foreach ($path as $field) {
            if (is_object($current)) {
                // Handle objects.
                if (!isset($current->{$field})) {
                    return $this;
                }
                $current = &$current->{$field};
            } else {
                // Handle arrays and scalars.
                if (!is_array($current) || !isset($current[$field])) {
                    return $this;
                }
                $current = &$current[$field];
            }
        }

        unset($current[$var]);

        return $this;
    }

    /**
     * Set default value by using dot notation for nested arrays/objects.
     *
     * @example $data->def('this.is.my.nested.variable', 'default');
     *
     * @param string $name Dot separated path to the requested value.
     * @param mixed $default Default value (or null).
     * @param string|null $separator Separator, defaults to '.'
     * @return $this
     */
    public function def($name, $default = null, $separator = null)
    {
        $this->set($name, $this->get($name, $default, $separator), $separator);

        return $this;
    }

    /**
     * Whether or not an offset exists.
     *
     * @param string $offset An offset to check for.
     * @return bool Returns TRUE on success or FALSE on failure.
     */
    #[\ReturnTypeWillChange]
    public function offsetExists($offset)
    {
        return $this->get($offset) !== null;
    }

    /**
     * Returns the value at specified offset.
     *
     * @param string $offset The offset to retrieve.
     * @return mixed Can return all value types.
     */
    #[\ReturnTypeWillChange]
    public function offsetGet($offset)
    {
        return $this->get($offset);
    }

    /**
     * Assigns a value to the specified offset.
     *
     * @param string|null $offset  The offset to assign the value to.
     * @param mixed $value   The value to set.
     * @return void
     */
    #[\ReturnTypeWillChange]
    public function offsetSet($offset, $value)
    {
        if (null === $offset) {
            $this->items[] = $value;
        } else {
            $this->set($offset, $value);
        }
    }

    /**
     * Unsets variable at specified offset.
     *
     * @param string|null $offset
     * @return void
     */
    #[\ReturnTypeWillChange]
    public function offsetUnset($offset)
    {
        if (null === $offset) {
            $this->items[] = [];
        } else {
            $this->undef($offset);
        }
    }
}
