<?php

namespace SIAPI\Negotiation\Negotiator;

use SIAPI\Negotiation\Strategy;
use SIAPI\Negotiation\Negotiator;
use SIAPI\Negotiation\AcceptHeader;

/**
 * Class Language
 * @package SIAPI\Negotiation\Negotiator
 */
class Language implements Negotiator
{
    /**
     * @var \SIAPI\Negotiation\Strategy
     */
    private $strategy;

    /**
     * @var \SIAPI\Negotiation\AcceptHeader;
     */
    private $collection;

    /**
     * @param AcceptHeader $collection
     * @param Strategy $strategy
     */
    public function __construct(AcceptHeader $collection, Strategy $strategy)
    {
        $this->strategy   = $strategy;
        $this->collection = $collection;
    }

    /**
     * {@inheritdoc}
     */
    public function negotiate(array $supported)
    {
        $value = null;
        if ($value = $this->collection->findFirstMatchingValue($supported)) {
            return $value;
        }
        if ($value = $this->collection->findFirstMatchingSubValue($supported)) {
            return $value;
        }
        if ($value = $this->collection->hasAcceptAllTag() && !empty($supported)) {
            return $supported[0];
        }
        return $value;
    }
}
