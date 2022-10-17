# DOMSanitizer

A simple but effective DOM/SVG/MathML Sanitizer for PHP 7.3+.  This was created due to my requirements for a performant DOM and specifically SVG sanitizer that was MIT compatible.  

This borrows the extensive list of valid tags and attributes in the excellent [DOMPurify](https://github.com/cure53/DOMPurify) library for JavaScript, but uses PHP DOMDocument to parse the DOM and filter out dangerous tags and attributes.

## Installation

```sh
composer require rhukster/dom-sanitizer
```

## Options

Options can be passed to the `sanitize()` method as an optional array.  Default values are:

```php
$options = [
    'remove-namespaces' => false,
    'remove-php-tags' => true,
    'remove-html-tags' => true,
    'remove-xml-tags' => true,
    'compress-output' => true,
];
```

## Usage

### Sanitizing HTML

The default option but provides with the full list of HTML tags and attributes.

```php
require 'vendor/autoload.php';

use Rhukster\DomSanitizer\DOMSanitizer;

$input = file_get_contents('bad.html');

$sanitizer = new DOMSanitizer(DOMSanitizer::HTML);
$output = $sanitizer->sanitize($input, [
    'remove-html-tags' => false,
]);
```

### Sanitizing SVG

You can limit the valid tags and attributes by passing `DOMSanitizer::SVG` to the constructor.  This is advisable if you know you are dealing with SVGs.

```php
require 'vendor/autoload.php';

use Rhukster\DomSanitizer\DOMSanitizer;

$input = file_get_contents('bad.svg');
$sanitizer = new DOMSanitizer(DOMSanitizer::SVG);
$output = $sanitizer->sanitize($input);
```

### Sanitizing MathML

You can limit the valid tags and attributes by passing `DOMSanitizer::MATHML` to the constructor.  This is advisable if you know you are dealing with MathML code.

```php
require 'vendor/autoload.php';

use Rhukster\DomSanitizer\DOMSanitizer;

$input = file_get_contents('mathml-sample.xml');
$sanitizer = new DOMSanitizer(DOMSanitizer::MATHML);
$output = $sanitizer->sanitize($input, [
    'compress-output' => false,
]);
```

### Modifying the allowed tags and attributes

You have full access to the tags and attributes via the following methods:

```php
public function addAllowedTags(array $allowed_tags): void

public function addAllowedAttributes(array $allowed_attributes): void

public function addDisallowedTags(array $disallowed_tags): void

public function addDisallowedAttributes(array $disallowed_attributes): void

public function getAllowedTags(): array

public function setAllowedTags(array $allowed_tags): void

public function getAllowedAttributes(): array

public function setAllowedAttributes(array $allowed_attributes): void

public function getDisallowedTags(): array

public function setDisallowedTags(array $disallowed_tags): void

public function getDisallowedAttributes(): array

public function setDisallowedAttributes($disallowed_attributes): void
```
