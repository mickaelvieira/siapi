<?php

namespace SIAPI\Component\Negotiation\Negotiator;

use SIAPI\Component\Negotiation\Negotiator;
use SIAPI\Component\Negotiation\AcceptHeader;

/**
 * Class Media
 * @package SIAPI\Component\Negotiation\Negotiator
 */
class Media implements Negotiator
{
    /**
     * @var \SIAPI\Component\Negotiation\AcceptHeader;
     */
    private $acceptHeader;

    /**
     * @param AcceptHeader $acceptHeader
     */
    public function __construct(AcceptHeader $acceptHeader)
    {
        $this->acceptHeader = $acceptHeader;
    }

    /**
     * {@inheritdoc}
     */
    public function negotiate(array $supported)
    {
        $value = null;
        if ($value = $this->acceptHeader->findFirstMatchingValue($supported)) {
            return $value;
        }
        if ($value = $this->acceptHeader->findFirstMatchingSubValue($supported)) {
            return $value;
        }
        if ($this->acceptHeader->hasAcceptAllTag() && !empty($supported)) {
            return $supported[0];
        }
        return $value;
    }
}
