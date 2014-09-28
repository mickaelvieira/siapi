<?php

namespace SIAPI\Negotiation\Negotiator;

use SIAPI\Negotiation\Strategy;
use SIAPI\Negotiation\Negotiator;
use SIAPI\Negotiation\Header\AcceptHeader;

/**
 * Class Charset
 * @package SIAPI\Negotiation\Negotiator
 */
class Charset implements Negotiator
{
    /**
     * @var \SIAPI\Negotiation\Strategy
     */
    private $strategy;

    /**
     * @var \SIAPI\Negotiation\Header\AcceptHeader;
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
        if ($value = $this->guessExact($supported)) {
            return $value;
        }
        if ($value = $this->guessAll($supported)) {
            return $value;
        }
        return $value;
    }

    private function guessExact(array $supported)
    {
        $value = null;
        foreach ($supported as $val) {
            if ($this->collection->hasValue($val)) {
                $value = $val;
                break;
            }
        }
        return $value;
    }

    /**
     * @param array $supported
     * @return null
     */
    private function guessAll(array $supported)
    {
        $value = null;
        if ($this->collection->hasAcceptAllTag() && !empty($supported)) {
            $value = $supported[0];
        }
        return $value;
    }
}
