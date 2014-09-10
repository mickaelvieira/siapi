<?php

namespace SIAPI\Negotiation\Strategy;

use SIAPI\Negotiation\Strategy;
use SIAPI\Negotiation\Header\Accept\Collection;

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
