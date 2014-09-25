<?php

namespace SIAPI\Negotiation\Negotiator;

use SIAPI\Negotiation\Guesser;
use SIAPI\Negotiation\Strategy;
use SIAPI\Negotiation\Negotiator;
use SIAPI\Negotiation\Header\AcceptHeader;

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
        foreach ($supported as $language) {
            if ($this->collection->hasValue($language)) {
                $found = $language;
                break;
            }
        }

        if (!$found) {

            $found = $this->guessGeneric($supported);

        }

        return $found;
    }

    /**
     * @param array $supported
     * @return null|string
     */
    protected function guessGeneric(array $supported)
    {
        $found = null;

        foreach ($supported as $language) {

            $split = explode('-', $language);
            if (count($split) === 2) {
                $this->collection->hasTag($split[0]);
                $found = $split[0];
                break;
            }
        }
        return $found;
    }
}
