<?php

namespace SIAPI\Negotiation\Negotiator;

//use SIAPI\Negotiation\Header\Accept\Collection\Charset;
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
    /*protected function getHeaderName()
    {
        return 'Accept-Charset';
    }*/

    /**
     * @param string $header
     * @return array
     */
    /*protected function getCollection($header)
    {
        return Charset::createFromString($header);
    }*/
}
