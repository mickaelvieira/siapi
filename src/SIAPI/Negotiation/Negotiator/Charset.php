<?php

namespace SIAPI\Negotiation\Negotiator;

use SIAPI\Negotiation\Negotiator;
use SIAPI\Negotiation\AcceptHeader;

/**
 * Class Charset
 * @package SIAPI\Negotiation\Negotiator
 */
class Charset implements Negotiator
{
    /**
     * @var \SIAPI\Negotiation\AcceptHeader;
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
