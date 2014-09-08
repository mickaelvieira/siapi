<?php

namespace SIAPI\Negotiation\Negotiator;

use SIAPI\Entity\Http\Header\AcceptCharset;
use SIAPI\Negotiation\Negotiator;

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
    protected function parseAcceptedValue($value)
    {
        $accept = null;

        return $accept;
    }

    /**
     * {@inheritDoc}
     */
    protected function getParsingRegex()
    {
        return "";
    }
}
