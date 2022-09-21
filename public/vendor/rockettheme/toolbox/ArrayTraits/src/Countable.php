<?php

namespace RocketTheme\Toolbox\ArrayTraits;

use function count;

/**
 * Implements \Countable interface.
 *
 * @package RocketTheme\Toolbox\ArrayTraits
 * @author RocketTheme
 * @license MIT
 */
trait Countable
{
    /**
     * Implements Countable interface.
     *
     * @return int
     */
    #[\ReturnTypeWillChange]
    public function count()
    {
        return count($this->items);
    }
}
