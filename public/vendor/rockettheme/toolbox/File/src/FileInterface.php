<?php

namespace RocketTheme\Toolbox\File;

/**
 * Defines FileInterface.
 *
 * @package RocketTheme\Toolbox\File
 * @author RocketTheme
 * @license MIT
 */
interface FileInterface
{
    /**
     * Get file instance.
     *
     * @param string $filename
     * @return static
     */
    public static function instance($filename);

    /**
     * Free the file instance.
     *
     * @return void
     */
    public function free();

    /**
     * Check if file exits.
     *
     * @return bool
     */
    public function exists();

    /**
     * Return file modification time.
     *
     * @return int Timestamp
     */
    public function modified();

    /**
     * Lock file for writing.
     *
     * @param bool $block  For non-blocking lock, set the parameter to false.
     * @return bool
     */
    public function lock($block = true);

    /**
     * Returns true if file has been locked for writing.
     *
     * @return bool|null True = locked, false = failed, null = not locked.
     */
    public function locked();

    /**
     * Unlock file.
     *
     * @return bool
     */
    public function unlock();

    /**
     * Check if file can be written.
     *
     * @return bool
     */
    public function writable();

    /**
     * (Re)Load a file and return its contents.
     *
     * @return string
     */
    public function load();

    /**
     * Get/set raw file contents.
     *
     * @param string|null $var
     * @return string
     */
    public function raw($var = null);

    /**
     * Get/set parsed file contents.
     *
     * @param string|array|null $var
     * @return string|array
     */
    public function content($var = null);

    /**
     * Save file.
     *
     * @param string|array|null $data Optional data to be saved.
     * @return void
     * @throws \RuntimeException
     */
    public function save($data = null);

    /**
     * Delete file from filesystem.
     *
     * @return bool
     */
    public function delete();
}
