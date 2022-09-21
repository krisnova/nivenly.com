<?php

/**
 * Author: Arlo Carreon <http://arlocarreon.com>
 * Grav integration: Andy Miller <https://getgrav.org>
 * Info: http://mexitek.github.io/phpColors/
 * License: http://arlo.mit-license.org/
 */

namespace Grav\Plugin\ColorTools;

/**
 * A color utility that helps manipulate HEX colors
 */
class Color extends \Mexitek\PHPColors\Color
{
    public function tailwindFormat(): string
    {
        $color = Color::hexToRgb($this->getHex());
        return "{$color['R']} {$color['G']} {$color['B']}";
    }
}
