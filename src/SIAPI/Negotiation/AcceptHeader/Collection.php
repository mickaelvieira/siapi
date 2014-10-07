<?php

namespace SIAPI\Negotiation\AcceptHeader;

/**
 * Class JsonCollection
 * @package SIAPI\Negotiation\AcceptHeader
 */
class Collection implements \IteratorAggregate
{
    /**
     * @var array
     */
    protected $entities = [];

    /**
     * @param \SIAPI\Negotiation\AcceptHeader\Entity $entity
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
