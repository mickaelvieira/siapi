<?php

namespace SIAPI\Negotiation\Negotiator;

use SIAPI\Negotiation\Guesser;
use SIAPI\Negotiation\Strategy;
use SIAPI\Negotiation\Negotiator;
use SIAPI\Negotiation\Header\Accept\Collection;

/**
 * Class Language
 * @package SIAPI\Negotiation\Negotiator
 */
class Language extends Negotiator implements Guesser
{
    /**
     * {@inheritdoc}
     */
    public function __construct(Collection $collection, Strategy $strategy)
    {
        parent::__construct($collection, $strategy);
    }

    /**
     * {@inheritdoc}
     */
    public function guess(array $supported)
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
