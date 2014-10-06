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
        $className  = self::getNegotiatorClassName($name);

        $collection = self::getCollectionInstance($name, $headerValue);
        $strategy   = self::getStrategyInstance($name);

        return new $className($collection, $strategy);
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
     * @param $name
     * @return \SIAPI\Negotiation\Strategy
     */
    private function getStrategyInstance($name)
    {
        $className = __NAMESPACE__ . "\\Strategy\\" . self::getClassName($name);
        return new $className();
    }

    /**
     * @param string $name
     * @param string $headerValue
     * @return \SIAPI\Negotiation\AcceptHeader
     */
    private function getCollectionInstance($name, $headerValue)
    {
        $className = __NAMESPACE__ . "\\AcceptHeader\\Values\\" . self::getClassName($name);
        return new $className($headerValue);
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
