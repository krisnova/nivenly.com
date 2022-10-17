<?php

namespace RocketTheme\Toolbox\ResourceLocator;

use BadMethodCallException;
use FilesystemIterator;
use RuntimeException;

/**
 * Implements FilesystemIterator for uniform resource locator.
 *
 * @package RocketTheme\Toolbox\ResourceLocator
 * @author RocketTheme
 * @license MIT
 */
class UniformResourceIterator extends FilesystemIterator
{
    /** @var FilesystemIterator */
    protected $iterator;
    /** @var array */
    protected $found;
    /** @var array */
    protected $stack;
    /** @var string */
    protected $path;
    /** @var int|null */
    protected $flags;
    /** @var UniformResourceLocator */
    protected $locator;

    /**
     * UniformResourceIterator constructor.
     * @param string $path
     * @param int|null $flags
     * @param UniformResourceLocator|null $locator
     */
    public function __construct($path, $flags = null, UniformResourceLocator $locator = null)
    {
        if (null === $locator) {
            throw new BadMethodCallException('Use $locator->getIterator() instead');
        }
        if ($path === '') {
            throw new BadMethodCallException('Url cannot be empty');
        }

        $this->path = $path;
        $this->flags = $flags;
        $this->locator = $locator;
        $this->rewind();
    }

    /**
     * @return $this|\SplFileInfo|string
     */
    #[\ReturnTypeWillChange]
    public function current()
    {
        if ($this->getFlags() & static::CURRENT_AS_SELF) {
            return $this;
        }

        return $this->iterator->current();
    }

    /**
     * @return string
     */
    #[\ReturnTypeWillChange]
    public function key()
    {
        return $this->iterator->key();
    }

    /**
     * @return void
     */
    #[\ReturnTypeWillChange]
    public function next()
    {
        do {
            $found = $this->findNext();
        } while (null !== $found && !empty($this->found[$found]));

        if (null !== $found) {
            // Mark the file as found.
            $this->found[$found] = true;
        }
    }

    /**
     * @return bool
     */
    #[\ReturnTypeWillChange]
    public function valid()
    {
        return $this->iterator->valid();
    }

    /**
     * @return void
     */
    #[\ReturnTypeWillChange]
    public function rewind()
    {
        $this->found = [];
        $this->stack = $this->locator->findResources($this->path);

        if (!$this->nextIterator()) {
            throw new BadMethodCallException('Failed to open dir: ' . $this->path . ' does not exist.');
        }

        // Find the first valid entry.
        while (!$this->valid()) {
            if ($this->nextIterator() === false) {
                return;
            }
        }

        // Mark the first file as found.
        $this->found[$this->getFilename()] = true;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        $path = $this->path . ($this->path[strlen($this->path) - 1] === '/' ? '' : '/');

        return $path . $this->iterator->getFilename();
    }

    /**
     * @param int $position
     * @return void
     */
    #[\ReturnTypeWillChange]
    public function seek($position)
    {
        throw new RuntimeException('Seek not implemented');
    }

    /**
     * @return int
     */
    #[\ReturnTypeWillChange]
    public function getATime()
    {
        return $this->iterator->getATime();
    }

    /**
     * @param string|null $suffix
     * @return string
     */
    #[\ReturnTypeWillChange]
    public function getBasename($suffix = null)
    {
        return null !== $suffix ? $this->iterator->getBasename($suffix) : $this->iterator->getBasename();
    }

    /**
     * @return int
     */
    #[\ReturnTypeWillChange]
    public function getCTime()
    {
        return $this->iterator->getCTime();
    }

    /**
     * @return string
     */
    #[\ReturnTypeWillChange]
    public function getExtension()
    {
        return $this->iterator->getExtension();
    }

    /**
     * @return string
     */
    #[\ReturnTypeWillChange]
    public function getFilename()
    {
        return $this->iterator->getFilename();
    }

    /**
     * @return int
     */
    #[\ReturnTypeWillChange]
    public function getGroup()
    {
        return $this->iterator->getGroup();
    }

    /**
     * @return int
     */
    #[\ReturnTypeWillChange]
    public function getInode()
    {
        return $this->iterator->getInode();
    }

    /**
     * @return int
     */
    #[\ReturnTypeWillChange]
    public function getMTime()
    {
        return $this->iterator->getMTime();
    }

    /**
     * @return int
     */
    #[\ReturnTypeWillChange]
    public function getOwner()
    {
        return $this->iterator->getOwner();
    }

    /**
     * @return string
     */
    #[\ReturnTypeWillChange]
    public function getPath()
    {
        return $this->iterator->getPath();
    }

    /**
     * @return string
     */
    #[\ReturnTypeWillChange]
    public function getPathname()
    {
        return $this->iterator->getPathname();
    }

    /**
     * @return int
     */
    #[\ReturnTypeWillChange]
    public function getPerms()
    {
        return $this->iterator->getPerms();
    }

    /**
     * @return int
     */
    #[\ReturnTypeWillChange]
    public function getSize()
    {
        return $this->iterator->getSize();
    }

    /**
     * @return string
     */
    #[\ReturnTypeWillChange]
    public function getType()
    {
        return $this->iterator->getType();
    }

    /**
     * @return bool
     */
    #[\ReturnTypeWillChange]
    public function isDir()
    {
        return $this->iterator->isDir();
    }

    /**
     * @return bool
     */
    #[\ReturnTypeWillChange]
    public function isDot()
    {
        return $this->iterator->isDot();
    }

    /**
     * @return bool
     */
    #[\ReturnTypeWillChange]
    public function isExecutable()
    {
        return $this->iterator->isExecutable();
    }

    /**
     * @return bool
     */
    #[\ReturnTypeWillChange]
    public function isFile()
    {
        return $this->iterator->isFile();
    }

    /**
     * @return bool
     */
    #[\ReturnTypeWillChange]
    public function isLink()
    {
        return $this->iterator->isLink();
    }

    /**
     * @return bool
     */
    #[\ReturnTypeWillChange]
    public function isReadable()
    {
        return $this->iterator->isReadable();
    }

    /**
     * @return bool
     */
    #[\ReturnTypeWillChange]
    public function isWritable()
    {
        return $this->iterator->isWritable();
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return (string)$this->iterator;
    }

    /**
     * @return int
     */
    #[\ReturnTypeWillChange]
    public function getFlags()
    {
        return $this->flags !== null ? $this->flags : static::KEY_AS_PATHNAME | static::CURRENT_AS_SELF | static::SKIP_DOTS;
    }

    /**
     * @param int|null $flags
     * @return void
     */
    #[\ReturnTypeWillChange]
    public function setFlags($flags = null)
    {
        $this->flags = $flags;

        $this->iterator->setFlags($this->getFlags());
    }

    /**
     * @return string|null
     */
    protected function findNext()
    {
        $this->iterator->next();

        while (!$this->valid()) {
            if ($this->nextIterator() === false) {
                return null;
            }
        }

        return $this->getFilename();
    }

    /**
     * @return bool
     * @phpstan-impure
     */
    protected function nextIterator()
    {
        // Move to the next iterator if it exists.
        $path = array_shift($this->stack);
        $hasNext = null !== $path;
        if ($hasNext) {
            $this->iterator = new FilesystemIterator($path, $this->getFlags());
        }

        return $hasNext;
    }
}
