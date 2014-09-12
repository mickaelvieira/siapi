<?php

namespace SIAPI\Negotiation;

/**
 * Interface Matcher
 * @package SIAPI\Negotiation
 */
interface Matcher
{
    /**
     * @param array $supported
     * @return mixed
     */
    public function match(array $supported);
}
