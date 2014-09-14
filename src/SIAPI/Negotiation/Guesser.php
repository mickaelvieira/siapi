<?php

namespace SIAPI\Negotiation;

/**
 * Interface Matcher
 * @package SIAPI\Negotiation
 */
interface Guesser
{
    /**
     * @param array $supported
     * @return mixed
     */
    public function guess(array $supported);
}
