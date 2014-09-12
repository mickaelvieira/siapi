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
     * @param $name
     * @throws \BadFunctionCallException
     */
    public static function incorrectNegotiatorCall($name)
    {
        throw new BadFunctionCallException(
            sprintf(
                'Incorrect negotiator name %s.',
                $name
            )
        );
    }

    /**
     * @param string $type
     * @throws \BadFunctionCallException
     */
    public static function incorrectSupportedHeaderType($type)
    {
        throw new BadFunctionCallException(
            sprintf(
                'Supported header argument must be of type array, %s provided',
                $type
            )
        );
    }
}
