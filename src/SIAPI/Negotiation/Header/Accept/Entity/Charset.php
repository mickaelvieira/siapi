<?php

namespace SIAPI\Negotiation\Header\Accept\Entity;

use SIAPI\Negotiation\Header\Accept\Entity;
use SIAPI\Negotiation\Header\Accept\ValueRange;

/**
 * Class Charset
 * @package SIAPI\Negotiation\Header\Accept\Entity
 */
class Charset extends Entity
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

    /**
     * {@inheritdoc}
     */
    protected function getValueRangeEntity($values)
    {
        return new ValueRange($values);
    }
}
