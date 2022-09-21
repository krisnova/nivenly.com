<?php

namespace RocketTheme\Toolbox\Blueprints;

use function function_exists;
use function is_array;
use function is_string;
use function method_exists;

/**
 * BlueprintSchema is used to define a data structure.
 *
 * @package RocketTheme\Toolbox\Blueprints
 * @author RocketTheme
 * @license MIT
 */
class BlueprintSchema
{
    /** @var array */
    protected $items = [];
    /** @var array */
    protected $rules = [];
    /** @var array */
    protected $nested = [];
    /** @var array */
    protected $dynamic = [];
    /** @var array */
    protected $filter = ['validation' => true];
    /** @var array */
    protected $ignoreFormKeys = ['fields' => 1];
    /** @var array */
    protected $types = [];

    /**
     * Constructor.
     *
     * @param array|null $serialized  Serialized content if available.
     */
    public function __construct($serialized = null)
    {
        if (is_array($serialized) && !empty($serialized)) {
            $this->items = (array)$serialized['items'];
            $this->rules = (array)$serialized['rules'];
            $this->nested = (array)$serialized['nested'];
            $this->dynamic = (array)$serialized['dynamic'];
            $this->filter = (array)$serialized['filter'];
        }
    }

    /**
     * @param array $types
     * @return $this
     */
    public function setTypes(array $types)
    {
        $this->types = $types;

        return $this;
    }

    /**
     * Restore Blueprints object.
     *
     * @param array $serialized
     * @return static
     */
    public static function restore(array $serialized)
    {
        return new static($serialized);
    }

    /**
     * Initialize blueprints with its dynamic fields.
     *
     * @return $this
     */
    public function init()
    {
        foreach ($this->dynamic as $key => $data) {
            $field = &$this->items[$key];

            foreach ($data as $property => $call) {
                $action = 'dynamic' . ucfirst($call['action']);

                if (method_exists($this, $action)) {
                    $this->{$action}($field, $property, $call);
                }
            }
        }

        return $this;
    }

    /**
     * Set filter for inherited properties.
     *
     * @param array $filter List of field names to be inherited.
     * @return void
     */
    public function setFilter(array $filter)
    {
        $this->filter = array_flip($filter);
    }

    /**
     * Get value by using dot notation for nested arrays/objects.
     *
     * @example $value = $data->get('this.is.my.nested.variable');
     *
     * @param string $name Dot separated path to the requested value.
     * @param mixed $default Default value (or null).
     * @param string $separator Separator, defaults to '.'
     * @return mixed  Value.
     */
    public function get($name, $default = null, $separator = '.')
    {
        $name = $separator !== '.' ? (string)str_replace($separator, '.', $name) : $name;

        return isset($this->items[$name]) ? $this->items[$name] : $default;
    }

    /**
     * Set value by using dot notation for nested arrays/objects.
     *
     * @example $value = $data->set('this.is.my.nested.variable', $newField);
     *
     * @param string $name Dot separated path to the requested value.
     * @param mixed $value New value.
     * @param string $separator Separator, defaults to '.'
     * @return void
     */
    public function set($name, $value, $separator = '.')
    {
        $name = $separator !== '.' ? (string)str_replace($separator, '.', $name) : $name;

        $this->items[$name] = $value;
        $this->addProperty($name);
    }

    /**
     * Define value by using dot notation for nested arrays/objects.
     *
     * @example $value = $data->set('this.is.my.nested.variable', true);
     *
     * @param string $name Dot separated path to the requested value.
     * @param mixed $value New value.
     * @param string $separator Separator, defaults to '.'
     * @return void
     */
    public function def($name, $value, $separator = '.')
    {
        $this->set($name, $this->get($name, $value, $separator), $separator);
    }

    /**
     * @return array
     * @deprecated 1.4 Use `->getState()` instead
     */
    public function toArray()
    {
        return $this->getState();
    }

    /**
     * Convert object into an array.
     *
     * @return array
     */
    public function getState()
    {
        return [
            'items' => $this->items,
            'rules' => $this->rules,
            'nested' => $this->nested,
            'dynamic' => $this->dynamic,
            'filter' => $this->filter
        ];
    }

    /**
     * Get nested structure containing default values defined in the blueprints.
     *
     * Fields without default value are ignored in the list.
     *
     * @return array
     */
    public function getDefaults()
    {
        return $this->buildDefaults($this->nested);
    }

    /**
     * Embed an array to the blueprint.
     *
     * @param string $name
     * @param array $value
     * @param string $separator
     * @param bool $merge   Merge fields instead replacing them.
     * @return $this
     */
    public function embed($name, array $value, $separator = '.', $merge = false)
    {
        if (isset($value['rules'])) {
            $this->rules = array_merge($this->rules, $value['rules']);
        }

        $name = $separator !== '.' ? (string)str_replace($separator, '.', $name) : $name;

        if (isset($value['form'])) {
            $form = array_diff_key($value['form'], ['fields' => 1, 'field' => 1]);
        } else {
            $form = [];
        }

        $items = isset($this->items[$name]) ? $this->items[$name] : ['type' => '_root', 'form_field' => false];

        $this->items[$name] = $items;
        $this->addProperty($name);

        $prefix = $name ? $name . '.' : '';
        $params = array_intersect_key($form, $this->filter);
        $location = [$name];

        if (isset($value['form']['field'])) {
            $this->parseFormField($name, $value['form']['field'], $params, $prefix, '', $merge, $location);
        } elseif (isset($value['form']['fields'])) {
            $this->parseFormFields($value['form']['fields'], $params, $prefix, '', $merge, $location);
        }

        $this->items[$name] += ['form' => $form];

        return $this;
    }

    /**
     * Merge two arrays by using blueprints.
     *
     * @param  array $data1
     * @param  array $data2
     * @param  string|null $name         Optional
     * @param  string $separator    Optional
     * @return array
     */
    public function mergeData(array $data1, array $data2, $name = null, $separator = '.')
    {
        $nested = $this->getNested($name, $separator);

        if (!is_array($nested)) {
            $nested = [];
        }

        return $this->mergeArrays($data1, $data2, $nested);
    }

    /**
     * Get the property with given path.
     *
     * @param string|null $path
     * @param string $separator
     * @return mixed
     */
    public function getProperty($path = null, $separator = '.')
    {
        $name = $this->getPropertyName($path, $separator);
        $property = $this->get($name);
        $nested = $this->getNested($name);

        return $this->getPropertyRecursion($property, $nested);
    }

    /**
     * Returns name of the property with given path.
     *
     * @param string|null $path
     * @param string $separator
     * @return string
     */
    public function getPropertyName($path = null, $separator = '.')
    {
        if (null === $path) {
            return '';
        }

        $parts = $separator !== '' ? explode($separator, $path) : [];
        $nested = $this->nested;

        $result = [];
        while (($part = array_shift($parts)) !== null) {
            if (!isset($nested[$part])) {
                if (isset($nested['*'])) {
                    $part = '*';
                } else {
                    return implode($separator, array_merge($result, [$part], $parts));
                }
            }
            $result[] = $part;
            $nested = $nested[$part];
        }

        return implode('.', $result);
    }

    /**
     * Return data fields that do not exist in blueprints.
     *
     * @param array $data
     * @param string $prefix
     * @return array
     */
    public function extra(array $data, $prefix = '')
    {
        $rules = $this->nested;

        // Drill down to prefix level
        if (!empty($prefix)) {
            $parts = explode('.', trim($prefix, '.'));
            foreach ($parts as $part) {
                $rules = isset($rules[$part]) ? $rules[$part] : [];
            }
        }

        // Check if the form cannot have extra fields.
        if (isset($rules[''])) {
            $rule = $this->items[''];
            if (isset($rule['type']) && $rule['type'] !== '_root') {
                return [];
            }
        }

        return $this->extraArray($data, $rules, $prefix);
    }

    /**
     * Get the property with given path.
     *
     * @param array|mixed $property
     * @param array|mixed $nested
     * @return mixed
     */
    protected function getPropertyRecursion($property, $nested)
    {
        if (empty($nested) || !is_array($nested) || !isset($property['type'])) {
            return $property;
        }

        if ($property['type'] === '_root') {
            foreach ($nested as $key => $value) {
                if ($key === '') {
                    continue;
                }

                $name = is_array($value) ? $key : $value;
                $property['fields'][$key] = $this->getPropertyRecursion($this->get($name), $value);
            }
        } elseif ($property['type'] === '_parent' || !empty($property['array'])) {
            foreach ($nested as $key => $value) {
                $name = is_array($value) ? "{$property['name']}.{$key}" : $value;
                $property['fields'][$key] = $this->getPropertyRecursion($this->get($name), $value);
            }
        }

        return $property;
    }

    /**
     * Get property from the definition.
     *
     * @param string|null $path  Comma separated path to the property.
     * @param string $separator
     * @return array|string|null
     * @internal
     */
    protected function getNested($path = null, $separator = '.')
    {
        if (!$path) {
            return $this->nested;
        }

        $parts = $separator !== '' ? explode($separator, $path) : [];
        $item = array_pop($parts);

        $nested = $this->nested;
        foreach ($parts as $part) {
            if (!isset($nested[$part])) {
                $part = '*';
                if (!isset($nested[$part])) {
                    return [];
                }
            }
            $nested = $nested[$part];
        }

        if (isset($nested[$item])) {
            return $nested[$item];
        }

        return isset($nested['*']) ? $nested['*'] : null;
    }

    /**
     * @param array $nested
     * @return array
     */
    protected function buildDefaults(array $nested)
    {
        $defaults = [];

        foreach ($nested as $key => $value) {
            if ($key === '*') {
                // TODO: Add support for adding defaults to collections.
                continue;
            }

            if (is_array($value)) {
                // Recursively fetch the items.
                $list = $this->buildDefaults($value);

                // Only return defaults if there are any.
                if (!empty($list)) {
                    $defaults[$key] = $list;
                }
            } else {
                // We hit a field; get default from it if it exists.
                $item = $this->get($value);

                // Only return default value if it exists.
                if (isset($item['default'])) {
                    $defaults[$key] = $item['default'];
                }
            }
        }

        return $defaults;
    }

    /**
     * @param array $data1
     * @param array $data2
     * @param array $rules
     * @return array
     * @internal
     */
    protected function mergeArrays(array $data1, array $data2, array $rules)
    {
        foreach ($data2 as $key => $field2) {
            $val = isset($rules[$key]) ? $rules[$key] : null;
            $rule = is_string($val) ? $this->items[$val] : null;
            $field1 = isset($data1[$key]) ? $data1[$key] : null;

            if (is_array($field1) && is_array($field2) && is_array($val)
                && (!isset($val['*']) || (!empty($rule['type']) && strpos($rule['type'], '_') === 0))) {
                // Array has been defined in blueprints and is not a collection of items.
                $data1[$key] = $this->mergeArrays($field1, $field2, $val);
            } else {
                // Otherwise just take value from the data2.
                $data1[$key] = $field2;
            }
        }

        return $data1;
    }

    /**
     * Gets all field definitions from the blueprints.
     *
     * @param array  $fields    Fields to parse.
     * @param array  $params    Property parameters.
     * @param string $prefix    Property prefix.
     * @param string $parent    Parent property.
     * @param bool   $merge     Merge fields instead replacing them.
     * @param array $formPath
     * @return void
     */
    protected function parseFormFields(array $fields, array $params, $prefix = '', $parent = '', $merge = false, array $formPath = [])
    {
        if (isset($fields['type']) && !is_array($fields['type'])) {
            return;
        }

        // Go though all the fields in current level.
        foreach ($fields as $key => $field) {
            if (is_array($field)) {
                $this->parseFormField($key, $field, $params, $prefix, $parent, $merge, $formPath);
            }
        }
    }

    /**
     * @param string $key
     * @param array $field
     * @param array $params
     * @param string $prefix
     * @param string $parent
     * @param bool $merge
     * @param array $formPath
     * @return void
     */
    protected function parseFormField($key, array $field, array $params, $prefix = '', $parent = '', $merge = false, array $formPath = [])
    {
        // Skip illegal field (needs to be an array).
        if (!is_array($field)) {
            return;
        }

        $key = $this->getFieldKey($key, $prefix, $parent);

        $newPath = array_merge($formPath, [$key]);

        $properties = array_diff_key($field, $this->ignoreFormKeys) + $params;
        $properties['name'] = $key;

        // Add all default properties for the field type (field needs to override them).
        $type = isset($properties['type']) ? $properties['type'] : '';
        if (isset($this->types[$type])) {
            $properties = $this->mergeTypeDefaults($properties, $this->types[$type]);
        }

        // Merge properties with existing ones.
        if ($merge && isset($this->items[$key])) {
            $properties += $this->items[$key];
        }

        // Parent type override.
        /** @var array $properties <- Workaround for phpstan 1 bug */
        $properties['type'] = !empty($properties['parent@']) ? '_parent' : $type;

        $isInputField = !isset($properties['input@']) || (bool)$properties['input@'];

        $propertyExists = isset($this->items[$key]);
        if (!$isInputField) {
            // Remove property if it exists.
            if ($propertyExists) {
                $this->removeProperty($key);
            }
        } elseif (!$propertyExists) {
            // Add missing property.
            $this->addProperty($key);
        }

        if (isset($field['fields'])) {
            // Recursively get all the nested fields.
            $isArray = !empty($properties['array']);
            $newParams = array_intersect_key($properties, $this->filter);
            $this->parseFormFields($field['fields'], $newParams, $prefix, $key . ($isArray ? '.*': ''), $merge, $newPath);
        } else {
            if (!isset($this->items[$key])) {
                // Add parent rules.
                $path = explode('.', $key);
                array_pop($path);
                $parent = '';

                foreach ($path as $part) {
                    $parent .= ($parent ? '.' : '') . $part;
                    if (!isset($this->items[$parent])) {
                        $this->items[$parent] = ['type' => '_parent', 'name' => $parent, 'form_field' => false];
                    }
                }
            }

            if ($isInputField) {
                $this->parseProperties($key, $properties);
            }
        }

        if ($isInputField) {
            $this->items[$key] = $properties;
        }
    }

    /**
     * @param array $properties
     * @param array $defaults
     * @return array
     */
    protected function mergeTypeDefaults(array $properties, array $defaults)
    {
        foreach ($properties as $key => $value) {
            if (is_int($key)) {
                // Handle items in a list, but avoid duplicates.
                if (!in_array($value, $defaults, true)) {
                    $defaults[] = $value;
                }
            } elseif (is_array($value) && isset($defaults[$key]) && is_array($defaults[$key])) {
                // Recursively merge array value.
                $defaults[$key] = $this->mergeTypeDefaults($value, $defaults[$key]);
            } else {
                // Replace value.
                $defaults[$key] = $value;
            }
        }

        return $defaults;
    }

    /**
     * @param string $key
     * @param string $prefix
     * @param string $parent
     * @return string
     */
    protected function getFieldKey($key, $prefix, $parent)
    {
        // Set name from the array key.
        if (is_string($key) && strpos($key[0], '.') === 0) {
            return ($parent ?: rtrim($prefix, '.')) . $key;
        }

        return $prefix . $key;
    }

    /**
     * @param string $key
     * @param array $properties
     * @return void
     */
    protected function parseProperties($key, array &$properties)
    {
        $key = ltrim($key, '.');

        if (!empty($properties['data'])) {
            $this->dynamic[$key] = $properties['data'];
        }

        foreach ($properties as $name => $value) {
            if (is_string($name) && strpos($name[0], '@') !== false) {
                $list = explode('-', trim($name, '@'), 2);
                $action = array_shift($list);
                $property = array_shift($list);

                $this->dynamic[$key][$property] = ['action' => $action, 'params' => $value];
            }
        }

        // Initialize predefined validation rule.
        if (isset($properties['validate']['rule'])) {
            $properties['validate'] += $this->getRule($properties['validate']['rule']);
        }
    }

    /**
     * Add property to the definition.
     *
     * @param string $path Comma separated path to the property.
     * @return void
     * @internal
     */
    protected function addProperty($path)
    {
        $parts = explode('.', $path);
        $item = array_pop($parts);

        $nested = &$this->nested;
        foreach ($parts as $part) {
            if (!isset($nested[$part]) || !is_array($nested[$part])) {
                $nested[$part] = [];
            }

            $nested = &$nested[$part];
        }

        if (!isset($nested[$item])) {
            $nested[$item] = $path;
        }
    }

    /**
     * Remove property to the definition.
     *
     * @param string $path Comma separated path to the property.
     * @return void
     * @internal
     */
    protected function removeProperty($path)
    {
        $parts = explode('.', $path);
        $item = array_pop($parts);

        $nested = &$this->nested;
        foreach ($parts as $part) {
            if (!isset($nested[$part]) || !is_array($nested[$part])) {
                return;
            }

            $nested = &$nested[$part];
        }

        if (isset($nested[$item])) {
            unset($nested[$item]);
        }
    }

    /**
     * @param string $rule
     * @return array
     * @internal
     */
    protected function getRule($rule)
    {
        if (isset($this->rules[$rule]) && is_array($this->rules[$rule])) {
            return $this->rules[$rule];
        }
        return [];
    }

    /**
     * @param array $data
     * @param array $rules
     * @param string $prefix
     * @return array
     * @internal
     */
    protected function extraArray(array $data, array $rules, $prefix)
    {
        $array = [];

        foreach ($data as $key => $field) {
            if (isset($rules[$key])) {
                $val = $rules[$key];
            } else {
                $val = isset($rules['*']) ? $rules['*'] : null;
            }
            $rule = is_string($val) ? $this->items[$val] : null;

            if ($rule || isset($val['*'])) {
                // Item has been defined in blueprints.
            } elseif (is_array($field) && is_array($val)) {
                // Array has been defined in blueprints.
                $array += $this->extraArray($field, $val, $prefix . $key . '.');
            } else {
                // Undefined/extra item.
                $array[$prefix.$key] = $field;
            }
        }
        return $array;
    }

    /**
     * @param array $field
     * @param string $property
     * @param array $call
     * @return void
     */
    protected function dynamicData(array &$field, $property, array $call)
    {
        $params = $call['params'];

        if (is_array($params)) {
            $function = array_shift($params);
        } else {
            $function = $params;
            $params = [];
        }

        $list = explode('::', $function, 2);
        $f = array_pop($list);
        $o = array_pop($list);

        if (!$o) {
            if ($f && function_exists($f)) {
                $data = $f(...$params);
            }
        } elseif ($f && method_exists($o, $f)) {
            $data = $o::{$f}(...$params);
        }

        // If function returns a value,
        if (isset($data)) {
            if (is_array($data) && isset($field[$property]) && is_array($field[$property])) {
                // Combine field and @data-field together.
                $field[$property] += $data;
            } else {
                // Or create/replace field with @data-field.
                $field[$property] = $data;
            }
        }
    }
}
