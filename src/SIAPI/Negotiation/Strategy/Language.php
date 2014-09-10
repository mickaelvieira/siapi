<?php

namespace SIAPI\Negotiation\Strategy;

use SIAPI\Negotiation\Strategy;
use SIAPI\Negotiation\Header\Accept\Collection;

/**
 * Class Language
 * @package SIAPI\Negotiation\Strategy
 */
class Language extends Strategy
{
    /**
     * {@inheritdoc}
     */
    public function select(Collection $collection)
    {
        return $collection;
    }
}
