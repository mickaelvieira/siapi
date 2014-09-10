<?php

namespace SIAPI\Negotiation\Negotiator;

//use SIAPI\Negotiation\Header\Accept\Collection\Language;
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
    /*protected function getHeaderName()
    {
        return 'Accept-Language';
    }*/

    /**
     * @param string $header
     * @return array
     */
    /*protected function getCollection($header)
    {
        return Language::createFromString($header);
    }*/
}
