<?php

namespace SIAPI\Search;

class Results implements \IteratorAggregate
{
    /**
     * @var array
     */
    protected $entities = [];

    /**
     * @param $entity
     */
    protected function add($entity)
    {
        array_push($this->entities, $entity);
    }

    /**
     * @return \ArrayIterator|\Traversable
     */
    public function getIterator()
    {
        return new \ArrayIterator($this->entities);
    }
} 