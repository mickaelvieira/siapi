<?php

namespace SIAPI\Negotiation\Header\Accept\Entity;

use SIAPI\Negotiation\Header\Accept\Entity;
use SIAPI\Negotiation\Header\Accept\ValueRange;

/**
 * Class Language
 * @package SIAPI\Negotiation\Header\Accept\Entity
 */
class Language extends Entity
{
    // Accept-Language = "Accept-Language" ":"
    //                   1#( language-range [ ";" "q" "=" qvalue ] )
    //                   language-range  = ( ( 1*8ALPHA *( "-" 1*8ALPHA ) ) | "*" )

    /**
     * @param string $pieces
     */
    /*public function __construct($pieces)
    {
        parent::__construct($pieces);
        $this->forceQualityWhenHasAcceptAllTag();
    }*/

    /**
     * @return bool
     */
    public function hasAcceptAllSubTag()
    {
        return $this->hasSubTag(null);
    }

    /**
     * {@inheritdoc}
     */
    protected function getValueRangeEntity($values)
    {
        return new ValueRange($values, "-");
    }
}
