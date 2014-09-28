<?php

namespace SIAPI\Negotiation\Header\Accept\Value;

use SIAPI\Negotiation\Header\Accept\Value;

/**
 * Class Charset
 * @package SIAPI\Negotiation\Header\Accept\Value
 */
class Charset extends Value
{
    // Accept-Charset = "Accept-Charset" ":"
    //                  1#( ( charset | "*" )[ ";" "q" "=" qvalue ] )

    /**
     * {@inheritdoc}
     */
    public function hasAcceptAllSubTag()
    {
        return false;
    }
}
