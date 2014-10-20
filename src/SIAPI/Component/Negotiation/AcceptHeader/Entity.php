<?php

namespace SIAPI\Component\Negotiation\AcceptHeader;

/**
 * Class Value
 * @package SIAPI\Component\Negotiation\AcceptHeader
 */
class Entity
{
    /**
     * @var int
     */
    protected $index = 0;

    /**
     * @param int $index
     */
    public function setIndex($index)
    {
        $this->index = (int)$index;
    }

    /**
     * @return int
     */
    public function getIndex()
    {
        return $this->index;
    }
}
