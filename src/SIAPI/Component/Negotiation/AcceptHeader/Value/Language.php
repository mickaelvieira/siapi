<?php

namespace SIAPI\Component\Negotiation\AcceptHeader\Value;

use SIAPI\Component\Negotiation\AcceptHeader\Value;

/**
 * Class Language
 * @package SIAPI\Component\Negotiation\AcceptHeader\Value
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
