<?php

namespace SIAPI\Search;

use ArrayIterator;
use SIAPI\Search\Result;

class ResultSet implements \IteratorAggregate, \Countable
{
    /**
     * @var array
     */
    protected $entities = [];

    /**
     * @param \SIAPI\Search\Result $entity
     */
    public function add(Result $entity)
    {
        array_push($this->entities, $entity);
    }

    /**
     * @return int
     */
    public function count()
    {
        return count($this->entities);
    }

    /**
     * @return \ArrayIterator|\Traversable
     */
    public function getIterator()
    {
        return new ArrayIterator($this->entities);
    }
} 