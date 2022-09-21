<?php

declare(strict_types=1);

/**
 * @package    Grav\Framework\File
 *
 * @copyright  Copyright (c) 2015 - 2022 Trilby Media, LLC. All rights reserved.
 * @license    MIT License; see LICENSE file for details.
 */

namespace Grav\Framework\File;

use Grav\Framework\File\Formatter\CsvFormatter;

/**
 * Class IniFile
 * @package RocketTheme\Toolbox\File
 */
class CsvFile extends DataFile
{
    /**
     * File constructor.
     * @param string $filepath
     * @param CsvFormatter $formatter
     */
    public function __construct($filepath, CsvFormatter $formatter)
    {
        parent::__construct($filepath, $formatter);
    }

    /**
     * @return array
     */
    public function load(): array
    {
        /** @var array */
        return parent::load();
    }
}
