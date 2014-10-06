<?php

namespace SIAPI\Negotiation;

use SIAPI\Negotiation\AcceptHeader\Collection;

/**
 * Class Strategy
 * @package SIAPI\Negotiation
 */
abstract class Strategy
{
    /**
     * @var \SIAPI\Negotiation\AcceptHeader
     */
    protected $acceptHeader;

    /**
     * @param \SIAPI\Negotiation\AcceptHeader $acceptHeader
     */
    /*public function __construct(AcceptHeader $acceptHeader)
    {
        $this->acceptHeader = $acceptHeader;
    }*/

    /**
     * @return \SIAPI\Negotiation\AcceptHeader\Collection
     * @param \SIAPI\Negotiation\AcceptHeader\Collection
     */
    abstract public function select(Collection $collection);
/*
    abstract public function getExact();

    abstract public function getGeneric();

    abstract public function getAllTag();*/
}
