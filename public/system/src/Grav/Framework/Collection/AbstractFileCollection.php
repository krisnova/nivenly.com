<?php

/**
 * @package    Grav\Framework\Collection
 *
 * @copyright  Copyright (c) 2015 - 2022 Trilby Media, LLC. All rights reserved.
 * @license    MIT License; see LICENSE file for details.
 */

namespace Grav\Framework\Collection;

use Doctrine\Common\Collections\Criteria;
use Doctrine\Common\Collections\Expr\ClosureExpressionVisitor;
use FilesystemIterator;
use Grav\Common\Grav;
use RecursiveDirectoryIterator;
use RocketTheme\Toolbox\ResourceLocator\RecursiveUniformResourceIterator;
use RocketTheme\Toolbox\ResourceLocator\UniformResourceLocator;
use RuntimeException;
use SeekableIterator;
use function array_slice;

/**
 * Collection of objects stored into a filesystem.
 *
 * @package Grav\Framework\Collection
 * @template TKey of array-key
 * @template T of object
 * @extends AbstractLazyCollection<TKey,T>
 * @implements FileCollectionInterface<TKey,T>
 */
class AbstractFileCollection extends AbstractLazyCollection implements FileCollectionInterface
{
    /** @var string */
    protected $path;
    /** @var RecursiveDirectoryIterator|RecursiveUniformResourceIterator */
    protected $iterator;
    /** @var callable */
    protected $createObjectFunction;
    /** @var callable|null */
    protected $filterFunction;
    /** @var int */
    protected $flags;
    /** @var int */
    protected $nestingLimit;

    /**
     * @param string $path
     */
    protected function __construct($path)
    {
        $this->path = $path;
        $this->flags = self::INCLUDE_FILES | self::INCLUDE_FOLDERS;
        $this->nestingLimit = 0;
        $this->createObjectFunction = [$this, 'createObject'];

        $this->setIterator();
    }

    /**
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * @param Criteria $criteria
     * @return ArrayCollection
     * @phpstan-return ArrayCollection<TKey,T>
     * @todo Implement lazy matching
     */
    public function matching(Criteria $criteria)
    {
        $expr = $criteria->getWhereExpression();

        $oldFilter = $this->filterFunction;
        if ($expr) {
            $visitor = new ClosureExpressionVisitor();
            $filter = $visitor->dispatch($expr);
            $this->addFilter($filter);
        }

        $filtered = $this->doInitializeByIterator($this->iterator, $this->nestingLimit);
        $this->filterFunction = $oldFilter;

        if ($orderings = $criteria->getOrderings()) {
            $next = null;
            /**
             * @var string $field
             * @var string $ordering
             */
            foreach (array_reverse($orderings) as $field => $ordering) {
                $next = ClosureExpressionVisitor::sortByField($field, $ordering === Criteria::DESC ? -1 : 1, $next);
            }
            /** @phpstan-ignore-next-line */
            if (null === $next) {
                throw new RuntimeException('Criteria is missing orderings');
            }

            uasort($filtered, $next);
        } else {
            ksort($filtered);
        }

        $offset = $criteria->getFirstResult();
        $length = $criteria->getMaxResults();

        if ($offset || $length) {
            $filtered = array_slice($filtered, (int)$offset, $length);
        }

        return new ArrayCollection($filtered);
    }

    /**
     * @return void
     */
    protected function setIterator()
    {
        $iteratorFlags = RecursiveDirectoryIterator::SKIP_DOTS + FilesystemIterator::UNIX_PATHS
            + FilesystemIterator::CURRENT_AS_SELF + FilesystemIterator::FOLLOW_SYMLINKS;

        if (strpos($this->path, '://')) {
            /** @var UniformResourceLocator $locator */
            $locator = Grav::instance()['locator'];
            $this->iterator = $locator->getRecursiveIterator($this->path, $iteratorFlags);
        } else {
            $this->iterator = new RecursiveDirectoryIterator($this->path, $iteratorFlags);
        }
    }

    /**
     * @param callable $filterFunction
     * @return $this
     */
    protected function addFilter(callable $filterFunction)
    {
        if ($this->filterFunction) {
            $oldFilterFunction = $this->filterFunction;
            $this->filterFunction = function ($expr) use ($oldFilterFunction, $filterFunction) {
                return $oldFilterFunction($expr) && $filterFunction($expr);
            };
        } else {
            $this->filterFunction = $filterFunction;
        }

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    protected function doInitialize()
    {
        $filtered = $this->doInitializeByIterator($this->iterator, $this->nestingLimit);
        ksort($filtered);

        $this->collection = new ArrayCollection($filtered);
    }

    /**
     * @param SeekableIterator $iterator
     * @param int $nestingLimit
     * @return array
     * @phpstan-param SeekableIterator<int,T> $iterator
     */
    protected function doInitializeByIterator(SeekableIterator $iterator, $nestingLimit)
    {
        $children = [];
        $objects = [];
        $filter = $this->filterFunction;
        $objectFunction = $this->createObjectFunction;

        /** @var RecursiveDirectoryIterator $file */
        foreach ($iterator as $file) {
            // Skip files if they shouldn't be included.
            if (!($this->flags & static::INCLUDE_FILES) && $file->isFile()) {
                continue;
            }

            // Apply main filter.
            if ($filter && !$filter($file)) {
                continue;
            }

            // Include children if the recursive flag is set.
            if (($this->flags & static::RECURSIVE) && $nestingLimit > 0 && $file->hasChildren()) {
                $children[] = $file->getChildren();
            }

            // Skip folders if they shouldn't be included.
            if (!($this->flags & static::INCLUDE_FOLDERS) && $file->isDir()) {
                continue;
            }

            $object = $objectFunction($file);
            $objects[$object->key] = $object;
        }

        if ($children) {
            $objects += $this->doInitializeChildren($children, $nestingLimit - 1);
        }

        return $objects;
    }

    /**
     * @param array $children
     * @param int $nestingLimit
     * @return array
     */
    protected function doInitializeChildren(array $children, $nestingLimit)
    {
        $objects = [];
        foreach ($children as $iterator) {
            $objects += $this->doInitializeByIterator($iterator, $nestingLimit);
        }

        return $objects;
    }

    /**
     * @param RecursiveDirectoryIterator $file
     * @return object
     */
    protected function createObject($file)
    {
        return (object) [
            'key' => $file->getSubPathname(),
            'type' => $file->isDir() ? 'folder' : 'file:' . $file->getExtension(),
            'url' => method_exists($file, 'getUrl') ? $file->getUrl() : null,
            'pathname' => $file->getPathname(),
            'mtime' => $file->getMTime()
        ];
    }
}
