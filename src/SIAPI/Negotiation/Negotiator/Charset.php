<?php

namespace SIAPI\Negotiation\Negotiator;

use SIAPI\Entity\Http\Header\AcceptCharset;
use SIAPI\Negotiation\Negotiator;

class Charset extends Negotiator
{
    /**
     * {@inheritDoc}
     */
    protected function getHeaderString(array $headers)
    {
        return array_key_exists('Accept-Charset', $headers) ?
            $headers['Accept-Charset'] :
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
