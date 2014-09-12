<?php

namespace SIAPI\Negotiation;

use BadFunctionCallException;

/**
 * Class Exception
 * @package SIAPI\Negotiation
 */
final class Exception
{
    /**
     * @param string $name
     * @param array $available
     * @throws \BadFunctionCallException
     */
    public static function invalidNegotiatorNameArgument($name, $available)
    {
        throw new BadFunctionCallException(
            sprintf(
                'Incorrect negotiator name %s. Available negotiators are %s',
                $name,
                implode($available)
            )
        );
    }

    /**
     * @param string $name
     * @throws \BadFunctionCallException
     */
    public static function missingSupportedHeaderArgument($name)
    {
        throw new BadFunctionCallException(
            sprintf(
                'Supported header argument must be of type array when calling method %s, none provided',
                $name
            )
        );
    }

    /**
     * @param string $name
     * @param string $type
     * @throws \BadFunctionCallException
     */
    public static function invalidSupportedHeaderArgument($name, $type)
    {
        throw new BadFunctionCallException(
            sprintf(
                'Supported header argument must be of type array when calling method %s, %s provided',
                $name,
                $type
            )
        );
    }
}
