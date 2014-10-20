<?php

namespace SIAPI\Component\Negotiation;

/**
 * Interface AcceptHeader
 * @package SIAPI\Component\Negotiation\AcceptHeader
 */
interface AcceptHeader
{
    /**
     * @return bool
     */
    public function hasAcceptAllTag();

    /**
     * @param array $values
     * @return null|string
     */
    public function findFirstMatchingValue(array $values);

    /**
     * @param array $values
     * @return null|string
     */
    public function findFirstMatchingSubValue(array $values);
}
