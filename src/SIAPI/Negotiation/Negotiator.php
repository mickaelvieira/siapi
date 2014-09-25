<?php

namespace SIAPI\Negotiation;

use Traversable;
use SIAPI\Negotiation\Header\AcceptHeader;

/**
 * Class Negotiator
 * @package SIAPI\Negotiation
 * @link http://www.w3.org/Protocols/rfc2616/rfc2616-sec14.html
 */
interface Negotiator
{
    /**
     * @param array $supported
     */
    public function negotiate(array $supported);
}
