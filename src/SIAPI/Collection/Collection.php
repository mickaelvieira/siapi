<?php

namespace SIAPI\Collection;

use Countable;
use ArrayIterator;
use IteratorAggregate;

/**
 * Class Collection
 * @package SIAPI\Collection
 */
class Collection implements Countable, IteratorAggregate
{
    /**
     * @var array
     */
    protected $entities = [];

    /**
     * @param array $entities
     */
    public function __construct(array $entities = [])
    {
        $this->entities = $entities;
    }

    /**
     * @param $item
     */
    public function add($item)
    {
        array_push($this->entities, $item);
    }

    /**
     * @return mixed
     */
    public function first()
    {
        return reset($this->entities);
    }

    /**
     * @return mixed
     */
    public function key()
    {
        return key($this->entities);
    }

    /**
     * @return mixed
     */
    public function prev()
    {
        return prev($this->entities);
    }

    /**
     * @return mixed
     */
    public function current()
    {
        return current($this->entities);
    }

    /**
     * @return mixed
     */
    public function next()
    {
        return next($this->entities);
    }

    /**
     * @return mixed
     */
    public function last()
    {
        return end($this->entities);
    }

    /**
     * @return int
     */
    public function count()
    {
        return count($this->entities);
    }

    /**
     * @return array
     */
    public function getIterator()
    {
        return new ArrayIterator($this->entities);
    }
}
