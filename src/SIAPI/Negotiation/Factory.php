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
     * @param array $headers
     * @return \SIAPI\Negotiation\Negotiator
     */
    public static function build($name, array $headers)
    {
        $className  = self::getNegotiatorClassName($name);

        $collection = self::getCollectionInstance($name, $headers);
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
     * @param $header
     * @return \SIAPI\Negotiation\Header\AcceptHeader
     */
    private function getCollectionInstance($name, array $header)
    {
        $className = __NAMESPACE__ . "\\Header\\Accept\\Collection\\" . self::getClassName($name);
        return new $className($header);
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
