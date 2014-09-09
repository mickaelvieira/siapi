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
        }

        return $negotiator;
    }

    /**
     * @param $name
     * @param $headers
     * @return \SIAPI\Negotiation\Negotiator
     */
    private function getNegotiatorInstance($name, $headers)
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
}
