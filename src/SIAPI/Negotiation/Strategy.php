<?php

namespace SIAPI\Negotiation;

use SIAPI\Negotiation\Header\Accept\Collection;
use SIAPI\Negotiation\Header\AcceptHeader;
/**
 * Class Strategy
 * @package SIAPI\Negotiation
 */
abstract class Strategy
{
    /**
     * @var \SIAPI\Negotiation\Header\AcceptHeader
     */
    protected $acceptHeader;

    /**
     * @param \SIAPI\Negotiation\Header\AcceptHeader $acceptHeader
     */
    /*public function __construct(AcceptHeader $acceptHeader)
    {
        $this->acceptHeader = $acceptHeader;
    }*/

    /**
     * @return \SIAPI\Negotiation\Header\Accept\Collection
     * @param \SIAPI\Negotiation\Header\Accept\Collection
     */
    abstract public function select(Collection $collection);
/*
    abstract public function getExact();

    abstract public function getGeneric();

    abstract public function getAllTag();*/
}
