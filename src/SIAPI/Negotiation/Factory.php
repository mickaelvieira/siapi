<?php

namespace SIAPI\Negotiation;

/**
 * Class Factory
 * @package SIAPI\Negotiation
 */
final class Factory
{
    /**
     * @param string $name
     * @param string $headerValue
     * @return \SIAPI\Negotiation\Negotiator
     */
    public static function build($name, $headerValue)
    {
        $negotiatorClass   = self::getNegotiatorClassName($name);
        $acceptHeaderClass = self::getAcceptHeaderClassName($name);

        $acceptHeader = new $acceptHeaderClass($headerValue);

        return new $negotiatorClass($acceptHeader);
    }

    /**
     * @param $name
     * @return \SIAPI\Negotiation\Negotiator
     */
    private function getNegotiatorClassName($name)
    {
        return __NAMESPACE__ . "\\Negotiator\\" . self::getClassName($name);
    }

    /**
     * @param string $name
     * @return \SIAPI\Negotiation\AcceptHeader
     */
    private function getAcceptHeaderClassName($name)
    {
        return __NAMESPACE__ . "\\AcceptHeader\\Values\\" . self::getClassName($name);
    }

    /**
     * @param string $name
     * @return string
     */
    private function getClassName($name)
    {
        return ucfirst(strtolower($name));
    }
}
