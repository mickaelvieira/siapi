<?php

namespace SIAPI\Component\Negotiation\AcceptHeader\Value;

use SIAPI\Component\Negotiation\AcceptHeader\Value;

/**
 * Class Charset
 * @package SIAPI\Component\Negotiation\AcceptHeader\Value
 */
class Charset extends Value
{
    /**
     * {@inheritdoc}
     */
    public function hasAcceptAllSubTag()
    {
        return false;
    }
}
