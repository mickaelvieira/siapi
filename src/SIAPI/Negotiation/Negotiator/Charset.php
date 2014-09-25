<?php

namespace SIAPI\Negotiation\Negotiator;

use SIAPI\Negotiation\Guesser;
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
        $found = null;
        foreach ($supported as $charset) {
            if ($this->collection->hasValue($charset)) {
                $found = $charset;
                break;
            }
        }

        if (!$found && $this->collection->hasAcceptAllTag()) {
            if (!empty($supported)) {
                $found = $supported[0];
            }
        }

        return $found;
    }
}
