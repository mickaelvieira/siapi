<?php

namespace SIAPI\Negotiation\Strategy;

use SIAPI\Negotiation\Strategy;
use SIAPI\Http\Request\Header\Accept\Collection;

/**
 * Class Charset
 * @package SIAPI\Negotiation\Strategy
 */
class Charset extends Strategy
{
    /**
     * {@inheritdoc}
     */
    public function sort(Collection $collection)
    {
        return $collection;
    }
}
