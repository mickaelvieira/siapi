<?php

namespace SIAPI\Negotiation\Negotiator;

use SIAPI\Entity\Http\Header\AcceptEncoding;
use SIAPI\Negotiation\Negotiator;

class Encoding extends Negotiator
{
    /**
     * {@inheritDoc}
     */
    protected function getHeaderString(array $headers)
    {
        return array_key_exists('Accept-Encoding', $headers) ?
            $headers['Accept-Encoding'] :
            '';
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
