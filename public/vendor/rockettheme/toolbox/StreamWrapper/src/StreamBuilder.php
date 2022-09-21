<?php

namespace RocketTheme\Toolbox\StreamWrapper;

use InvalidArgumentException;

/**
 * Class StreamBuilder
 * @package RocketTheme\Toolbox\StreamWrapper
 */
class StreamBuilder
{
    /** @var array */
    protected $items = [];

    /**
     * StreamBuilder constructor.
     * @param string[] $items
     * @throws InvalidArgumentException
     */
    public function __construct(array $items = [])
    {
        foreach ($items as $scheme => $handler) {
            $this->add($scheme, $handler);
        }
    }

    /**
     * @param string $scheme
     * @param string $handler
     * @return $this
     * @throws InvalidArgumentException
     */
    public function add($scheme, $handler)
    {
        if (isset($this->items[$scheme])) {
            if ($handler === $this->items[$scheme]) {
                return $this;
            }
            throw new InvalidArgumentException("Stream '{$scheme}' has already been initialized.");
        }

        if (!is_subclass_of($handler, StreamInterface::class)) {
            throw new InvalidArgumentException("Stream '{$scheme}' has unknown or invalid type.");
        }

        if (!@stream_wrapper_register($scheme, $handler)) {
            throw new InvalidArgumentException("Stream '{$scheme}' could not be initialized.");
        }

        $this->items[$scheme] = $handler;

        return $this;
    }

    /**
     * @param string $scheme
     * @return $this
     */
    public function remove($scheme)
    {
        if (isset($this->items[$scheme])) {
            stream_wrapper_unregister($scheme);
            unset($this->items[$scheme]);
        }

        return $this;
    }

    /**
     * @return array
     */
    public function getStreams()
    {
        return $this->items;
    }

    /**
     * @param string $scheme
     * @return bool
     */
    public function isStream($scheme)
    {
        return isset($this->items[$scheme]);
    }

    /**
     * @param string $scheme
     * @return StreamInterface|null
     */
    public function getStreamType($scheme)
    {
        return isset($this->items[$scheme]) ? $this->items[$scheme] : null;
    }
}
