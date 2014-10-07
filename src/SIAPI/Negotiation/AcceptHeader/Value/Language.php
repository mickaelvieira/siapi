<?php

namespace SIAPI\Negotiation\AcceptHeader\Value;

use SIAPI\Negotiation\AcceptHeader\Value;

/**
 * Class Language
 * @package SIAPI\Negotiation\AcceptHeader\Value
 */
class Language extends Value
{
    /**
     * @var string
     */
    public static $delimiter = "-";

    /**
     * {@inheritdoc}
     */
    public function hasAcceptAllSubTag()
    {
        return $this->hasSubTag(null);
    }
}
