<?php

namespace SIAPI\Negotiation\Negotiator;

final class Factory
{
    /**
     * @param string $name
     * @param array $headers
     * @return \SIAPI\Negotiation\Negotiator
     */
    public static function build($name, array $headers)
    {
        $className = __NAMESPACE__ . "\\" .ucfirst(strtolower($name));

        if (!class_exists($className)) {
            self::throwClassNameException($className);
        }
        return new $className($headers);
    }

    /**
     * @param string $className
     * @throws \LogicException
     */
    private function throwClassNameException($className)
    {
        throw new \LogicException(
            sprintf(
                "Cannot build negotiator. Class %s does not exist",
                $className
            )
        );
    }
}
