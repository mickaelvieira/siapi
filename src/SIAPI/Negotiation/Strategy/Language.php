<?php

namespace SIAPI\Negotiation\Strategy;

use SIAPI\Negotiation\Strategy;
use SIAPI\Http\Request\Header\Accept\Collection;

/**
 * Class Language
 * @package SIAPI\Negotiation\Strategy
 */
class Language extends Strategy
{
    /**
     * {@inheritdoc}
     */
    public function sort(Collection $collection)
    {
        return $collection;
    }
}
