<?php

namespace SIAPI\Negotiation\Negotiator;

use Traversable;
use SIAPI\Negotiation\Guesser;
use SIAPI\Negotiation\Strategy;
use SIAPI\Negotiation\Negotiator;
use SIAPI\Negotiation\Header\Accept\Collection;

/**
 * Class Media
 * @package SIAPI\Negotiation\Negotiator
 */
class Media extends Negotiator implements Guesser
{
    /**
     * {@inheritdoc}
     */
    public function __construct(Traversable $collection, Strategy $strategy)
    {
        parent::__construct($collection, $strategy);
    }

    /**
     * {@inheritdoc}
     */
    public function guess(array $supported)
    {

    }
}
