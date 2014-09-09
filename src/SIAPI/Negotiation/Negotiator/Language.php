<?php

namespace SIAPI\Negotiation\Negotiator;

use SIAPI\Http\Request\Header\AcceptLanguage;
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
     * @param string $value
     * @return array
     */
    protected function getEntity($value)
    {
        return new AcceptLanguage($value);
    }
}
