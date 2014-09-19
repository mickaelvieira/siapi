<?php
/**
 * Created by PhpStorm.
 * User: mickael
 * Date: 16/09/14
 * Time: 07:56
 */

namespace SIAPI\Negotiation\Header;

/**
 * Interface AcceptHeader
 * @package SIAPI\Negotiation\Header
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
}
