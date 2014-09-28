<?php

namespace SIAPI\Negotiation\Negotiator;

use SIAPI\Negotiation\Strategy;
use SIAPI\Negotiation\Negotiator;
use SIAPI\Negotiation\Header\AcceptHeader;

/**
 * Class Media
 * @package SIAPI\Negotiation\Negotiator
 */
class Media implements Negotiator
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
        if ($value = $this->guessGeneric($supported)) {
            return $value;
        }
        return $value;
    }

    /**
     * @param array $supported
     * @return null|string
     */
    private function guessExact($supported)
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
     * @return null|string
     */
    private function guessGeneric($supported)
    {
        $value = null;
        foreach ($supported as $val) {
            $split = explode('/', $val);
            if (count($split) === 2) {
                if ($this->collection->hasTag($split[0]) && $this->collection->hasAcceptAllSubTag($split[0])) {
                    $value = $val;
                    break;
                }
            }
        }
        return $value;
    }
}
