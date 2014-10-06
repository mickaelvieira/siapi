<?php

namespace SIAPI\Negotiation\Strategy;

use SIAPI\Negotiation\Strategy;
use SIAPI\Negotiation\AcceptHeader\Collection;

/**
 * Class Media
 * @package SIAPI\Negotiation\Strategy
 */
class Media extends Strategy
{
    /**
     * {@inheritdoc}
     */
    public function select(Collection $collection)
    {
        return $collection;
    }
}
