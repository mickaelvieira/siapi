<?php

namespace SIAPI\Negotiation\AcceptHeader\Value;

use SIAPI\Negotiation\AcceptHeader\Value;

/**
 * Class Charset
 * @package SIAPI\Negotiation\AcceptHeader\Value
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
