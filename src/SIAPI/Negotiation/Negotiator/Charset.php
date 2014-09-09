<?php

namespace SIAPI\Negotiation\Negotiator;

use SIAPI\Http\Request\Header\AcceptCharset;
use SIAPI\Negotiation\Negotiator;

/**
 * Class Charset
 * @package SIAPI\Negotiation\Negotiator
 */
class Charset extends Negotiator
{
    /**
     * {@inheritDoc}
     */
    protected function getHeaderName()
    {
        return 'Accept-Charset';
    }

    /**
     * @param string $value
     * @return array
     */
    protected function getEntity($value)
    {
        return new AcceptCharset($value);
    }
}
