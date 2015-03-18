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
     * @param \SIAPI\Component\Search\Result $result
     */
    public function add(Result $result)
    {
        array_push($this->results, $result);
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
