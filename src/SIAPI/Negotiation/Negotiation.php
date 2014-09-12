<?php

namespace SIAPI\Negotiation;

use SIAPI\Negotiation\Exception;

/**
 * Class Negotiation
 * @package SIAPI\Negotiation
 */
class Negotiation
{
    /**
     * @var array
     */
    private $negotiators = [
        'media',
        'charset',
        'language'
    ];

    /**
     * @var array
     */
    private $headers = [];

    /**
     * @param array $headers
     */
    public function __construct(array $headers)
    {
        $this->headers = $headers;
    }

    /**
     * @param string $name
     * @param array $arguments
     * @return string|null
     * @throws \BadFunctionCallException
     */
    public function __call($name, array $arguments)
    {
        if (!in_array($name, $this->negotiators)) {
            Exception::invalidNegotiatorNameArgument($name, $this->negotiators);
        }
        if (empty($arguments)) {
            Exception::missingSupportedHeaderArgument($name);
        }
        if (!is_array($arguments[0])) {
            Exception::invalidSupportedHeaderArgument($name, gettype($arguments[0]));
        }

        $negotiator = $this->getNegotiator($name, $this->headers);

        return $negotiator->match($arguments[0]);
    }

    /**
     * @param string $name
     * @param array $headers
     * @return \SIAPI\Negotiation\Matcher
     */
    private function getNegotiator($name, array $headers)
    {
        return Factory::build($name, $headers);
    }
}
