<?php

/**
 * @package    Grav\Framework\Flex
 *
 * @copyright  Copyright (c) 2015 - 2022 Trilby Media, LLC. All rights reserved.
 * @license    MIT License; see LICENSE file for details.
 */

namespace Grav\Framework\Flex;

use ArrayAccess;
use Exception;
use Grav\Common\Data\Blueprint;
use Grav\Common\Data\Data;
use Grav\Common\Grav;
use Grav\Common\Twig\Twig;
use Grav\Common\Utils;
use Grav\Framework\Flex\Interfaces\FlexFormInterface;
use Grav\Framework\Flex\Interfaces\FlexObjectFormInterface;
use Grav\Framework\Flex\Interfaces\FlexObjectInterface;
use Grav\Framework\Form\Interfaces\FormFlashInterface;
use Grav\Framework\Form\Traits\FormTrait;
use Grav\Framework\Route\Route;
use JsonSerializable;
use RocketTheme\Toolbox\ArrayTraits\NestedArrayAccessWithGetters;
use RuntimeException;
use Twig\Error\LoaderError;
use Twig\Error\SyntaxError;
use Twig\Template;
use Twig\TemplateWrapper;

/**
 * Class FlexForm
 * @package Grav\Framework\Flex
 */
class FlexForm implements FlexObjectFormInterface, JsonSerializable
{
    use NestedArrayAccessWithGetters {
        NestedArrayAccessWithGetters::get as private traitGet;
        NestedArrayAccessWithGetters::set as private traitSet;
    }
    use FormTrait {
        FormTrait::doSerialize as doTraitSerialize;
        FormTrait::doUnserialize as doTraitUnserialize;
    }

    /** @var array */
    private $items = [];

    /** @var array|null */
    private $form;
    /** @var FlexObjectInterface */
    private $object;
    /** @var string */
    private $flexName;
    /** @var callable|null */
    private $submitMethod;

    /**
     * @param array $options    Options to initialize the form instance:
     *                          (string) name: Form name, allows you to use custom form.
     *                          (string) unique_id: Unique id for this form instance.
     *                          (array) form: Custom form fields.
     *                          (FlexObjectInterface) object: Object instance.
     *                          (string) key: Object key, used only if object instance isn't given.
     *                          (FlexDirectory) directory: Flex Directory, mandatory if object isn't given.
     *
     * @return FlexFormInterface
     */
    public static function instance(array $options = [])
    {
        if (isset($options['object'])) {
            $object = $options['object'];
            if (!$object instanceof FlexObjectInterface) {
                throw new RuntimeException(__METHOD__ . "(): 'object' should be instance of FlexObjectInterface", 400);
            }
        } elseif (isset($options['directory'])) {
            $directory = $options['directory'];
            if (!$directory instanceof FlexDirectory) {
                throw new RuntimeException(__METHOD__ . "(): 'directory' should be instance of FlexDirectory", 400);
            }
            $key = $options['key'] ?? '';
            $object = $directory->getObject($key) ?? $directory->createObject([], $key);
        } else {
            throw new RuntimeException(__METHOD__ . "(): You need to pass option 'directory' or 'object'", 400);
        }

        $name = $options['name'] ?? '';

        // There is no reason to pass object and directory.
        unset($options['object'], $options['directory']);

        return $object->getForm($name, $options);
    }

    /**
     * FlexForm constructor.
     * @param string $name
     * @param FlexObjectInterface $object
     * @param array|null $options
     */
    public function __construct(string $name, FlexObjectInterface $object, array $options = null)
    {
        $this->name = $name;
        $this->setObject($object);

        if (isset($options['form']['name'])) {
            // Use custom form name.
            $this->flexName = $options['form']['name'];
        } else {
            // Use standard form name.
            $this->setName($object->getFlexType(), $name);
        }
        $this->setId($this->getName());

        $uniqueId = $options['unique_id'] ?? null;
        if (!$uniqueId) {
            if ($object->exists()) {
                $uniqueId = $object->getStorageKey();
            } elseif ($object->hasKey()) {
                $uniqueId = "{$object->getKey()}:new";
            } else {
                $uniqueId = "{$object->getFlexType()}:new";
            }
            $uniqueId = md5($uniqueId);
        }
        $this->setUniqueId($uniqueId);

        $directory = $object->getFlexDirectory();
        $this->setFlashLookupFolder($options['flash_folder'] ?? $directory->getBlueprint()->get('form/flash_folder') ?? 'tmp://forms/[SESSIONID]');
        $this->form = $options['form'] ?? null;

        if (Utils::isPositive($this->items['disabled'] ?? $this->form['disabled'] ?? false)) {
            $this->disable();
        }

        if (!empty($options['reset'])) {
            $this->getFlash()->delete();
        }

        $this->initialize();
    }

    /**
     * @return $this
     */
    public function initialize()
    {
        $this->messages = [];
        $this->submitted = false;
        $this->data = null;
        $this->files = [];
        $this->unsetFlash();

        /** @var FlexFormFlash $flash */
        $flash = $this->getFlash();
        if ($flash->exists()) {
            $data = $flash->getData();
            if (null !== $data) {
                $data = new Data($data, $this->getBlueprint());
                $data->setKeepEmptyValues(true);
                $data->setMissingValuesAsNull(true);
            }

            $object = $flash->getObject();
            if (null === $object) {
                throw new RuntimeException('Flash has no object');
            }

            $this->object = $object;
            $this->data = $data;

            $includeOriginal = (bool)($this->getBlueprint()->form()['images']['original'] ?? null);
            $this->files = $flash->getFilesByFields($includeOriginal);
        }

        return $this;
    }

    /**
     * @param string $uniqueId
     * @return void
     */
    public function setUniqueId(string $uniqueId): void
    {
        if ($uniqueId !== '') {
            $this->uniqueid = $uniqueId;
        }
    }

    /**
     * @param string $name
     * @param mixed $default
     * @param string|null $separator
     * @return mixed
     */
    public function get($name, $default = null, $separator = null)
    {
        switch (strtolower($name)) {
            case 'id':
            case 'uniqueid':
            case 'name':
            case 'noncename':
            case 'nonceaction':
            case 'action':
            case 'data':
            case 'files':
            case 'errors';
            case 'fields':
            case 'blueprint':
            case 'page':
                $method = 'get' . $name;
                return $this->{$method}();
        }

        return $this->traitGet($name, $default, $separator);
    }

    /**
     * @param string $name
     * @param mixed $value
     * @param string|null $separator
     * @return FlexForm
     */
    public function set($name, $value, $separator = null)
    {
        switch (strtolower($name)) {
            case 'id':
            case 'uniqueid':
                $method = 'set' . $name;
                return $this->{$method}();
        }

        return $this->traitSet($name, $value, $separator);
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->flexName;
    }

    /**
     * @param callable|null $submitMethod
     */
    public function setSubmitMethod(?callable $submitMethod): void
    {
        $this->submitMethod = $submitMethod;
    }

    /**
     * @param string $type
     * @param string $name
     */
    protected function setName(string $type, string $name): void
    {
        // Make sure that both type and name do not have dash (convert dashes to underscores).
        $type = str_replace('-', '_', $type);
        $name = str_replace('-', '_', $name);
        $this->flexName = $name ? "flex-{$type}-{$name}" : "flex-{$type}";
    }

    /**
     * @return Data|FlexObjectInterface|object
     */
    public function getData()
    {
        return $this->data ?? $this->getObject();
    }

    /**
     * Get a value from the form.
     *
     * Note: Used in form fields.
     *
     * @param string $name
     * @return mixed
     */
    public function getValue(string $name)
    {
        // Attempt to get value from the form data.
        $value = $this->data ? $this->data[$name] : null;

        // Return the form data or fall back to the object property.
        return $value ?? $this->getObject()->getFormValue($name);
    }

    /**
     * @param string $name
     * @return array|mixed|null
     */
    public function getDefaultValue(string $name)
    {
        return $this->object->getDefaultValue($name);
    }

    /**
     * @return array
     */
    public function getDefaultValues(): array
    {
        return $this->object->getDefaultValues();
    }
    /**
     * @return string
     */
    public function getFlexType(): string
    {
        return $this->object->getFlexType();
    }

    /**
     * Get form flash object.
     *
     * @return FormFlashInterface|FlexFormFlash
     */
    public function getFlash()
    {
        if (null === $this->flash) {
            $grav = Grav::instance();
            $config = [
                'session_id' => $this->getSessionId(),
                'unique_id' => $this->getUniqueId(),
                'form_name' => $this->getName(),
                'folder' => $this->getFlashFolder(),
                'id' => $this->getFlashId(),
                'object' => $this->getObject()
            ];

            $this->flash = new FlexFormFlash($config);
            $this->flash
                ->setUrl($grav['uri']->url)
                ->setUser($grav['user'] ?? null);
        }

        return $this->flash;
    }

    /**
     * @return FlexObjectInterface
     */
    public function getObject(): FlexObjectInterface
    {
        return $this->object;
    }

    /**
     * @return FlexObjectInterface
     */
    public function updateObject(): FlexObjectInterface
    {
        $data = $this->data instanceof Data ? $this->data->toArray() : [];
        $files = $this->files;

        return $this->getObject()->update($data, $files);
    }

    /**
     * @return Blueprint
     */
    public function getBlueprint(): Blueprint
    {
        if (null === $this->blueprint) {
            try {
                $blueprint = $this->getObject()->getBlueprint($this->name);
                if ($this->form) {
                    // We have field overrides available.
                    $blueprint->extend(['form' => $this->form], true);
                    $blueprint->init();
                }
            } catch (RuntimeException $e) {
                if (!isset($this->form['fields'])) {
                    throw $e;
                }

                // Blueprint is not defined, but we have custom form fields available.
                $blueprint = new Blueprint(null, ['form' => $this->form]);
                $blueprint->load();
                $blueprint->setScope('object');
                $blueprint->init();
            }

            $this->blueprint = $blueprint;
        }

        return $this->blueprint;
    }

    /**
     * @return Route|null
     */
    public function getFileUploadAjaxRoute(): ?Route
    {
        $object = $this->getObject();
        if (!method_exists($object, 'route')) {
            /** @var Route $route */
            $route = Grav::instance()['route'];

            return $route->withExtension('json')->withGravParam('task', 'media.upload');
        }

        return $object->route('/edit.json/task:media.upload');
    }

    /**
     * @param string|null $field
     * @param string|null $filename
     * @return Route|null
     */
    public function getFileDeleteAjaxRoute($field = null, $filename = null): ?Route
    {
        $object = $this->getObject();
        if (!method_exists($object, 'route')) {
            /** @var Route $route */
            $route = Grav::instance()['route'];

            return $route->withExtension('json')->withGravParam('task', 'media.delete');
        }

        return $object->route('/edit.json/task:media.delete');
    }

    /**
     * @param array $params
     * @param string|null $extension
     * @return string
     */
    public function getMediaTaskRoute(array $params = [], string $extension = null): string
    {
        $grav = Grav::instance();
        /** @var Flex $flex */
        $flex = $grav['flex_objects'];

        if (method_exists($flex, 'adminRoute')) {
            return $flex->adminRoute($this->getObject(), $params, $extension ?? 'json');
        }

        return '';
    }

    /**
     * @param string $name
     * @return mixed|null
     */
    #[\ReturnTypeWillChange]
    public function __get($name)
    {
        $method = "get{$name}";
        if (method_exists($this, $method)) {
            return $this->{$method}();
        }

        $form = $this->getBlueprint()->form();

        return $form[$name] ?? null;
    }

    /**
     * @param string $name
     * @param mixed $value
     * @return void
     */
    #[\ReturnTypeWillChange]
    public function __set($name, $value)
    {
        $method = "set{$name}";
        if (method_exists($this, $method)) {
            $this->{$method}($value);
        }
    }

    /**
     * @param string $name
     * @return bool
     */
    #[\ReturnTypeWillChange]
    public function __isset($name)
    {
        $method = "get{$name}";
        if (method_exists($this, $method)) {
            return true;
        }

        $form = $this->getBlueprint()->form();

        return isset($form[$name]);
    }

    /**
     * @param string $name
     * @return void
     */
    #[\ReturnTypeWillChange]
    public function __unset($name)
    {
    }

    /**
     * @return array|bool
     */
    protected function getUnserializeAllowedClasses()
    {
        return [FlexObject::class];
    }

    /**
     * Note: this method clones the object.
     *
     * @param FlexObjectInterface $object
     * @return $this
     */
    protected function setObject(FlexObjectInterface $object): self
    {
        $this->object = clone $object;

        return $this;
    }

    /**
     * @param string $layout
     * @return Template|TemplateWrapper
     * @throws LoaderError
     * @throws SyntaxError
     */
    protected function getTemplate($layout)
    {
        $grav = Grav::instance();

        /** @var Twig $twig */
        $twig = $grav['twig'];

        return $twig->twig()->resolveTemplate(
            [
                "flex-objects/layouts/{$this->getFlexType()}/form/{$layout}.html.twig",
                "flex-objects/layouts/_default/form/{$layout}.html.twig",
                "forms/{$layout}/form.html.twig",
                'forms/default/form.html.twig'
            ]
        );
    }

    /**
     * @param array $data
     * @param array $files
     * @return void
     * @throws Exception
     */
    protected function doSubmit(array $data, array $files)
    {
        /** @var FlexObject $object */
        $object = clone $this->getObject();

        $method = $this->submitMethod;
        if ($method) {
            $method($data, $files, $object);
        } else {
            $object->update($data, $files);
            $object->save();
        }

        $this->setObject($object);
        $this->reset();
    }

    /**
     * @return array
     */
    protected function doSerialize(): array
    {
        return $this->doTraitSerialize() + [
                'items' => $this->items,
                'form' => $this->form,
                'object' => $this->object,
                'flexName' => $this->flexName,
                'submitMethod' => $this->submitMethod,
            ];
    }

    /**
     * @param array $data
     * @return void
     */
    protected function doUnserialize(array $data): void
    {
        $this->doTraitUnserialize($data);

        $this->items = $data['items'] ?? null;
        $this->form = $data['form'] ?? null;
        $this->object = $data['object'] ?? null;
        $this->flexName = $data['flexName'] ?? null;
        $this->submitMethod = $data['submitMethod'] ?? null;
    }

    /**
     * Filter validated data.
     *
     * @param ArrayAccess|Data|null $data
     * @return void
     * @phpstan-param ArrayAccess<string,mixed>|Data|null $data
     */
    protected function filterData($data = null): void
    {
        if ($data instanceof Data) {
            $data->filter(true, true);
        }
    }
}
