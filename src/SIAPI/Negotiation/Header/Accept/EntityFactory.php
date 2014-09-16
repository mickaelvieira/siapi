<?php

namespace SIAPI\Negotiation\Header\Accept;

/**
 * Class Factory
 * @package SIAPI\Negotiation\Header\Accept
 */
class EntityFactory
{
    /**
     * @param string $name
     * @param string $value
     * @return \SIAPI\Negotiation\Header\Accept\Entity
     */
    public static function build($name, $value)
    {
        $className  = self::getEntityClassName($name);

        return new $className($value);
    }

    /**
     * @param string $name
     * @return string
     */
    private function getEntityClassName($name)
    {
        return __NAMESPACE__ . "\\Entity\\" . $name;
    }
}
