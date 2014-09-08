<?php

namespace SIAPI\Negotiation\Negotiator;

use SIAPI\Entity\Http\Header\AcceptMedia;
use SIAPI\Negotiation\Negotiator;

class Media extends Negotiator
{
    /**
     * {@inheritDoc}
     */
    protected function getHeaderString(array $headers)
    {
        return array_key_exists('Accept', $headers) ?
            $headers['Accept'] :
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
