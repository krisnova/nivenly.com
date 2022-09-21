# Color Tools Plugin

The **Color Tools** Plugin is an extension for [Grav CMS](http://github.com/getgrav/grav) that provides useful Twig and PHP tools for working with CSS colors. When a color object is created, it provides the ability to call a variety of methods to manipulate the color and returns the results.

## Methods Available

* `complementary()`
* `darken()`
* `getCssGradient()`
* `getHex()`
* `getHsl()`
* `getRgb()`
* `hexToHsl()`
* `hexToRgb()`
* `hslToHex()`
* `isDark()`
* `isLight()`
* `lighten()`
* `makeGradient()`
* `mix()`
* `nameToHex()`
* `rgbToHex()`
* `rgbToString()`
* `tailwindFormat()`

More information can be found on the GitHub site for the library: https://github.com/mexitek/phpColors

## Installation

Installing the Color Tools plugin can be done in one of three ways: The GPM (Grav Package Manager) installation method lets you quickly install the plugin with a simple terminal command, the manual method lets you do so via a zip file, and the admin method lets you do so via the Admin Plugin.

### GPM Installation

To install the plugin via the [GPM](http://learn.getgrav.org/advanced/grav-gpm), through your system's terminal (also called the command line), navigate to the root of your Grav-installation, and enter:

    bin/gpm install color-tools

This will install the Color Tools plugin into your `/user/plugins`-directory within Grav. Its files can be found under `/your/site/grav/user/plugins/color-tools`.

### Admin Plugin

If you use the Admin Plugin, you can install the plugin directly by browsing the `Plugins`-menu and clicking on the `Add` button.

## Twig Usage

This plugin returns a color object with the twig filter `|color`. For example:

```twig
{% set orange_color = '#FFCC00'|color %}
{{ orange_color.darken(20) }}
```

or

```twig
{% set button_color = page.header.hero_button.color|color %}
{% set button_css_class = button_color.isLight() ? 'text-dark' : 'text-light' %}
```

A `color()` function is also available:

```twig
{% set orange_color = color('#FFCC00') %}
{{ orange_color.darken(20) }}
```

To use the `name_to_hex` function or twig:

```twig
{{ name_to_hex('chartreuse') }}

or

{{ 'lavender'|name_to_hex }}
```

Full list of color names: https://github.com/mexitek/phpColors/blob/master/src/Mexitek/PHPColors/Color.php#L241

## PHP Usage

To use this class in PHP is also quite simple, an example that mimic above can be seen below:

```php
use Grav\Plugin\ColorTools\Color;

$orange_color = new Color('#FFCC00');
$darker_orange = $orange_color->darken(20);

$button_color = new Color($page_header['hero_button']['color']);
$button_css_class = $button_color->isLight() ? 'text-dark' : 'text-light';
```

## Credits

The PHP class used was originally developed by Arlo Carreon <http://arlocarreon.com> in [mexitek/phpColors](https://github.com/mexitek/phpColors), then modified by Trilby Media.
