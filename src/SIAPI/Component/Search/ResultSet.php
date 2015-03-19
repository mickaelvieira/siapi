<?php

namespace SIAPI\Component\Search;

use ArrayIterator;
use SIAPI\Component\Search\Result;

final class ResultSet implements \IteratorAggregate, \Countable
{
    /**
     * @var int
     */
    private $total;

    /**
     * @var array
     */
    private $results = [];

    /**
     * @param int $total
     * @param array $set
     */
    public function __construct($total, array $set = [])
    {
        $this->total = (int)$total;

        foreach ($set as $result) {
            $this->add($result);
        }
    }

    /**
     * @return int
     */
    public function getTotal()
    {
        return $this->total;
    }

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
