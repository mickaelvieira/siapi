<?php

namespace SIAPI\Negotiation\Header\Accept\Value;

use SIAPI\Negotiation\Header\Accept\Value;

/**
 * Class Language
 * @package SIAPI\Negotiation\Header\Accept\Value
 */
class Language extends Value
{
    // Accept-Language = "Accept-Language" ":"
    //                   1#( language-range [ ";" "q" "=" qvalue ] )
    //                   language-range  = ( ( 1*8ALPHA *( "-" 1*8ALPHA ) ) | "*" )
    /**
     * @var string
     */
    protected $valueRangeDelimiter = "-";

    /**
     * {@inheritdoc}
     */
    public function hasAcceptAllSubTag()
    {
        return $this->hasSubTag(null);
    }
}
