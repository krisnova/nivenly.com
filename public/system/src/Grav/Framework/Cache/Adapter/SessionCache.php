<?php

/**
 * @package    Grav\Framework\Cache
 *
 * @copyright  Copyright (c) 2015 - 2022 Trilby Media, LLC. All rights reserved.
 * @license    MIT License; see LICENSE file for details.
 */

namespace Grav\Framework\Cache\Adapter;

use Grav\Framework\Cache\AbstractCache;

/**
 * Cache class for PSR-16 compatible "Simple Cache" implementation using session backend.
 *
 * @package Grav\Framework\Cache
 */
class SessionCache extends AbstractCache
{
    public const VALUE = 0;
    public const LIFETIME = 1;

    /**
     * @param string $key
     * @param mixed $miss
     * @return mixed
     */
    public function doGet($key, $miss)
    {
        $stored = $this->doGetStored($key);

        return $stored ? $stored[self::VALUE] : $miss;
    }

    /**
     * @param string $key
     * @param mixed $value
     * @param int $ttl
     * @return bool
     */
    public function doSet($key, $value, $ttl)
    {
        $stored = [self::VALUE => $value];
        if (null !== $ttl) {
            $stored[self::LIFETIME] = time() + $ttl;
        }

        $_SESSION[$this->getNamespace()][$key] = $stored;

        return true;
    }

    /**
     * @param string $key
     * @return bool
     */
    public function doDelete($key)
    {
        unset($_SESSION[$this->getNamespace()][$key]);

        return true;
    }

    /**
     * @return bool
     */
    public function doClear()
    {
        unset($_SESSION[$this->getNamespace()]);

        return true;
    }

    /**
     * @param string $key
     * @return bool
     */
    public function doHas($key)
    {
        return $this->doGetStored($key) !== null;
    }

    /**
     * @return string
     */
    public function getNamespace()
    {
        return 'cache-' . parent::getNamespace();
    }

    /**
     * @param string $key
     * @return mixed|null
     */
    protected function doGetStored($key)
    {
        $stored = $_SESSION[$this->getNamespace()][$key] ?? null;

        if (isset($stored[self::LIFETIME]) && $stored[self::LIFETIME] < time()) {
            unset($_SESSION[$this->getNamespace()][$key]);
            $stored = null;
        }

        return $stored ?: null;
    }
}
