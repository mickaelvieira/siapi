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
        foreach ($supported as $val) {
            if ($value = $this->guessExact($val)) {
                return $value;
            }
            if ($value = $this->guessGeneric($val)) {
                return $value;
            }
        }

        if ($value = $this->guessAll($supported)) {
            return $value;
        }

        return $value;
    }

    /**
     * @param string $val
     * @return null|string
     */
    private function guessExact($val)
    {
        $value = null;
        if ($this->collection->hasValue($val)) {
            $value = $val;
        }
        return $value;
    }

    /**
     * @param string $val
     * @return null|string
     */
    private function guessGeneric($val)
    {
        $value = null;
        $split = explode('-', $val);
        if (count($split) === 2) {
            if ($this->collection->hasTag($split[0]) && $this->collection->hasAcceptAllSubTag($split[0])) {
                $value = $val;
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
