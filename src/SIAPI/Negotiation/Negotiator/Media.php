<?php

namespace SIAPI\Negotiation\Negotiator;

use SIAPI\Entity\Http\Header\AcceptMedia;
use SIAPI\Negotiation\Negotiator;

class Media extends Negotiator
{
    /**
     * {@inheritDoc}
     */
    protected function getHeaderName()
    {
        return 'Accept';
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
