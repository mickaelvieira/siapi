<?php

namespace SIAPI\Entity\Http\Header;

use ArrayIterator;

class Collection implements \Countable, \IteratorAggregate
{
    /**
     * @var array
     */
    private $collection = array();

    /**
     * @param array $collection
     */
    public function __construct(array $collection)
    {
        $this->collection = $collection;

    }

    /**
     * @return mixed
     */
    public function first()
    {
        return reset($this->collection);
    }

    /**
     * @return mixed
     */
    public function last()
    {
        return end($this->collection);
    }

    /**
     * @return mixed
     */
    public function key()
    {
        return key($this->collection);
    }

    /**
     * @return mixed
     */
    public function next()
    {
        return next($this->collection);
    }

    /**
     * @return mixed
     */
    public function current()
    {
        return current($this->collection);
    }

    /**
     * @return int
     */
    public function count()
    {
        return count($this->collection);
    }

    /**
     * @return array
     */
    public function getIterator()
    {
        return new ArrayIterator($this->collection);
    }
}
