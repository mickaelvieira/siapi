<?php

namespace SIAPI\Negotiation\Header\Accept;

/**
 * Class Collection
 * @package SIAPI\Negotiation\Header\Accept
 */
class Collection implements \IteratorAggregate
{
    /**
     * @var array
     */
    protected $entities = [];

    /**
     * @param \SIAPI\Negotiation\Header\Accept\Entity $entity
     */
    protected function add(Entity $entity)
    {
        $entity->setIndex(count($this->entities));
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
