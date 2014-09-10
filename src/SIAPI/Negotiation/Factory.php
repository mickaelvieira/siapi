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
        $negotiator = self::getNegotiatorInstance($name, $headers);

        if ($negotiator instanceof Negotiator) {
            $negotiator->setStrategy(self::getStrategyInstance($name));
            $negotiator->setCollection(self::getCollectionInstance($name, $headers));
        }

        return $negotiator;
    }

    /**
     * @param $name
     * @param $headers
     * @return \SIAPI\Negotiation\Negotiator
     */
    private function getNegotiatorInstance($name, array $headers)
    {
        $className = __NAMESPACE__ . "\\Negotiator\\" . ucfirst(strtolower($name));
        return new $className($headers);
    }

    /**
     * @param $name
     * @return \SIAPI\Negotiation\Strategy
     */
    private function getStrategyInstance($name)
    {
        $className = __NAMESPACE__ . "\\Strategy\\" . ucfirst(strtolower($name));
        return new $className();
    }

    /**
     * @param string $name
     * @param $header
     * @return \SIAPI\Negotiation\Header\Accept\Collection
     */
    private function getCollectionInstance($name, array $header)
    {
        $className = __NAMESPACE__ . "\\Header\\Accept\\Collection\\" . ucfirst(strtolower($name));
        return new $className($header);
    }
}
