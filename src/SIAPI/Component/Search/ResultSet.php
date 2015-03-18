<?php

namespace SIAPI\Component\Search;

use ArrayIterator;
use SIAPI\Component\Search\Result;

final class ResultSet implements \IteratorAggregate, \Countable
{
    /**
     * @var array
     */
    private $results = [];

    /**
     * @param \SIAPI\Component\Search\Result $entity
     */
    public function add(Result $entity)
    {
        array_push($this->results, $entity);
    }

    /**
     * @return int
     */
    public function count()
    {
        return count($this->results);
    }

    /**
     * @return \ArrayIterator|\Traversable
     */
    public function getIterator()
    {
        return new ArrayIterator($this->results);
    }
}
