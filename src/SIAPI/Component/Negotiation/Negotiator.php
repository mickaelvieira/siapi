<?php

namespace SIAPI\Component\Negotiation;

/**
 * Class Negotiator
 * @package SIAPI\Component\Negotiation
 * @link http://www.w3.org/Protocols/rfc2616/rfc2616-sec14.html
 */
interface Negotiator
{
    /**
     * @param array $supported
     * @return string|null
     */
    public function negotiate(array $supported);
}
