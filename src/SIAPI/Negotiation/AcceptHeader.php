<?php

namespace SIAPI\Negotiation;

/**
 * Interface AcceptHeader
 * @package SIAPI\Negotiation\AcceptHeader
 */
interface AcceptHeader
{
    /**
     * @return bool
     */
    public function hasAcceptAllTag();

    /**
     * @param string $tag
     * @return bool
     */
    public function hasAcceptAllSubTag($tag);

    /**
     * @param string $tag
     * @return bool
     */
    public function hasTag($tag);

    /**
     * @param string $subSubTag
     * @return bool
     */
    public function hasSubTag($subSubTag);

    /**
     * @param string $value
     * @return bool
     */
    public function hasValue($value);

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
