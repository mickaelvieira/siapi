<?php

namespace SIAPI\Negotiation\Strategy;

use SIAPI\Negotiation\Strategy;
use SIAPI\Negotiation\AcceptHeader\Collection;

/**
 * Class Charset
 * @package SIAPI\Negotiation\Strategy
 */
class Charset extends Strategy
{
    /**
     * {@inheritdoc}
     */
    public function select(Collection $collection)
    {
        return $collection;
    }
}
