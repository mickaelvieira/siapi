<?php

namespace SIAPI\Negotiation\AcceptHeader\Value;

use SIAPI\Negotiation\AcceptHeader\Value;

/**
 * Class Charset
 * @package SIAPI\Negotiation\AcceptHeader\Value
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
