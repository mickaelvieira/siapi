<?php

namespace SIAPI\Negotiation\Negotiator;

use SIAPI\Http\Request\Header\Accept\Collection\AcceptLanguage;
use SIAPI\Negotiation\Negotiator;

/**
 * Class Language
 * @package SIAPI\Negotiation\Negotiator
 */
class Language extends Negotiator
{
    /**
     * {@inheritDoc}
     */
    protected function getHeaderName()
    {
        return 'Accept-Language';
    }

    /**
     * @param string $header
     * @return array
     */
    protected function getCollection($header)
    {
        return AcceptLanguage::createFromString($header);
    }
}
