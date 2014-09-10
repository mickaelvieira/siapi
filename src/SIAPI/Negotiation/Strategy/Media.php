<?php

namespace SIAPI\Negotiation\Strategy;

use SIAPI\Negotiation\Strategy;
use SIAPI\Http\Request\Header\Accept\Collection;

/**
 * Class Media
 * @package SIAPI\Negotiation\Strategy
 */
class Media extends Strategy
{
    /**
     * {@inheritdoc}
     */
    public function sort(Collection $collection)
    {
        return $collection;
    }
}
