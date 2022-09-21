<?php

declare(strict_types=1);

/**
 * @package    Grav\Framework\File\Formatter
 *
 * @copyright  Copyright (c) 2015 - 2022 Trilby Media, LLC. All rights reserved.
 * @license    MIT License; see LICENSE file for details.
 */

namespace Grav\Framework\File\Formatter;

use Grav\Framework\File\Interfaces\FileFormatterInterface;
use RuntimeException;
use stdClass;
use function is_array;
use function is_string;

/**
 * Class SerializeFormatter
 * @package Grav\Framework\File\Formatter
 */
class SerializeFormatter extends AbstractFormatter
{
    /**
     * IniFormatter constructor.
     * @param array $config
     */
    public function __construct(array $config = [])
    {
        $config += [
            'file_extension' => '.ser',
            'decode_options' => ['allowed_classes' => [stdClass::class]]
        ];

        parent::__construct($config);
    }

    /**
     * Returns options used in decode().
     *
     * By default only allow stdClass class.
     *
     * @return array
     */
    public function getOptions()
    {
        return $this->getConfig('decode_options');
    }

    /**
     * {@inheritdoc}
     * @see FileFormatterInterface::encode()
     */
    public function encode($data): string
    {
        return serialize($this->preserveLines($data, ["\n", "\r"], ['\\n', '\\r']));
    }

    /**
     * {@inheritdoc}
     * @see FileFormatterInterface::decode()
     */
    public function decode($data)
    {
        $classes = $this->getOptions()['allowed_classes'] ?? false;
        $decoded = @unserialize($data, ['allowed_classes' => $classes]);

        if ($decoded === false && $data !== serialize(false)) {
            throw new RuntimeException('Decoding serialized data failed');
        }

        return $this->preserveLines($decoded, ['\\n', '\\r'], ["\n", "\r"]);
    }

    /**
     * Preserve new lines, recursive function.
     *
     * @param mixed $data
     * @param array $search
     * @param array $replace
     * @return mixed
     */
    protected function preserveLines($data, array $search, array $replace)
    {
        if (is_string($data)) {
            $data = str_replace($search, $replace, $data);
        } elseif (is_array($data)) {
            foreach ($data as &$value) {
                $value = $this->preserveLines($value, $search, $replace);
            }
            unset($value);
        }

        return $data;
    }
}
