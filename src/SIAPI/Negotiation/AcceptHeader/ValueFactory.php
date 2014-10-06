<?php

namespace SIAPI\Negotiation\AcceptHeader;

/**
 * Class Factory
 * @package SIAPI\Negotiation\AcceptHeader
 */
class ValueFactory
{
    /**
     * @param string $type
     * @param string $value
     * @return \SIAPI\Negotiation\AcceptHeader\Value
     */
    public static function build($type, $value)
    {
        $className  = self::getEntityClassName($type);

        return new $className($value);
    }

    /**
     * @param string $name
     * @return string
     */
    private function getEntityClassName($name)
    {
        return __NAMESPACE__ . "\\Value\\" . $name;
    }
}
