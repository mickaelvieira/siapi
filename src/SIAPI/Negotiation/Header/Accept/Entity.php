<?php

namespace SIAPI\Negotiation\Header\Accept;

/**
 * Class Value
 * @package SIAPI\Negotiation\Header\Accept
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
