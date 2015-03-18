<?php

namespace SIAPI\Component\Search\Query;

final class Params implements \Countable, \IteratorAggregate
{

    /**
     * @var array
     */
    private $whiteList = [
        'target',
        'satellite_of',
        'mission',
        'spacecraft',
        'instrument',
        'q',
    ];

    /**
     * @var array
     */
    private $params = [];

    /**
     * @param array $params
     */
    public function __construct(array $params)
    {
        foreach ($params as $name => $value) {
            if (in_array($name, $this->whiteList)) {
                array_push($this->params, new Param($name, $value));
            }
        }
    }

    /**
     * @return int
     */
    public function count()
    {
        return count($this->params);
    }

    /**
     * @return \ArrayIterator
     */
    public function getIterator()
    {
        return new \ArrayIterator($this->params);
    }
}
