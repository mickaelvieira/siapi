<?php

namespace SIAPI\Negotiation;

use Traversable;
use SIAPI\Negotiation\Header\Accept\Entity as AcceptEntity;
use SIAPI\Negotiation\Header\Accept\Collection;

/**
 * Class Negotiator
 * @package SIAPI\Negotiation
 * @link http://www.w3.org/Protocols/rfc2616/rfc2616-sec14.html
 */
abstract class Negotiator implements Matcher
{
    /**
     * @var \SIAPI\Negotiation\Strategy
     */
    protected $strategy;

    /**
     * @var \SIAPI\Negotiation\Header\Accept\Collection;
     */
    protected $collection;

    /**
     * @param \SIAPI\Negotiation\Strategy $strategy
     */
    public function setStrategy(Strategy $strategy)
    {
        $this->strategy = $strategy;
    }

    /**
     * @return \SIAPI\Negotiation\Strategy $strategy
     */
    public function getStrategy()
    {
        return $this->strategy;
    }

    /**
     * @param Traversable $collection
     */
    public function setCollection(Traversable $collection)
    {
        $this->collection = $collection;
    }

    /**
     * @return \Traversable $strategy
     */
    public function getCollection()
    {
        return $this->collection;
    }
}
