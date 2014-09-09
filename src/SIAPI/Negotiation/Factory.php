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
        $negotiatorClassName = self::getNegotiatorClassName($name);
        $strategyClassName   = self::getStrategyClassName($name);

        if (!class_exists($negotiatorClassName)) {
            self::throwNegotiatorClassNameException($negotiatorClassName);
        }
        if (!class_exists($strategyClassName)) {
            self::throwStrategyClassNameException($strategyClassName);
        }

        /** @var \SIAPI\Negotiation\Negotiator $negotiator */
        $negotiator = new $negotiatorClassName($headers);
        $strategy   = new $strategyClassName();

        $negotiator->setStrategy($strategy);

        return $negotiator;
    }

    /**
     * @param string $name
     * @return string
     */
    private function getNegotiatorClassName($name)
    {
        return __NAMESPACE__ . "\\Negotiator\\" . ucfirst(strtolower($name));
    }

    /**
     * @param string $name
     * @return string
     */
    private function getStrategyClassName($name)
    {
        return __NAMESPACE__ . "\\Strategy\\" . ucfirst(strtolower($name));
    }

    /**
     * @param string $className
     * @throws \LogicException
     */
    private function throwNegotiatorClassNameException($className)
    {
        throw new \LogicException(
            sprintf(
                "Cannot build negotiator. Class %s does not exist",
                $className
            )
        );
    }

    /**
     * @param string $className
     * @throws \LogicException
     */
    private function throwStrategyClassNameException($className)
    {
        throw new \LogicException(
            sprintf(
                "Cannot build negotiator strategy. Class %s does not exist",
                $className
            )
        );
    }
}
