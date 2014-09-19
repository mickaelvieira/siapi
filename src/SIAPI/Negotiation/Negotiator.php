<?php

namespace SIAPI\Negotiation;

use Traversable;
use SIAPI\Negotiation\Header\AcceptHeader;

/**
 * Class Negotiator
 * @package SIAPI\Negotiation
 * @link http://www.w3.org/Protocols/rfc2616/rfc2616-sec14.html
 */
class Negotiator
{
    /**
     * @var \SIAPI\Negotiation\Strategy
     */
    protected $strategy;

    /**
     * @var \SIAPI\Negotiation\Header\AcceptHeader;
     */
    protected $collection;

    /**
     * @param AcceptHeader $collection
     * @param Strategy $strategy
     */
    protected function __construct(AcceptHeader $collection, Strategy $strategy)
    {
        $this->strategy   = $strategy;
        $this->collection = $collection;
    }

    /**
     * @return \SIAPI\Negotiation\Strategy $strategy
     */
    public function getStrategy()
    {
        return $this->strategy;
    }

    /**
     * @return \Traversable $strategy
     */
    public function getCollection()
    {
        return $this->collection;
    }
}
