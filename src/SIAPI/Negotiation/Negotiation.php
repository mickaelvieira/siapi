<?php

namespace SIAPI\Negotiation;

/**
 * Class Negotiation
 * @package SIAPI\Negotiation
 * @link http://www.w3.org/Protocols/rfc2616/rfc2616-sec12
 * - Server-driven Negotiation
 * - Agent-driven Negotiation
 * @TODO this is the server driven negotiation, we should change the name
 *
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
        $this->checkArguments($name, $arguments);

        $negotiator = $this->getNegotiator($name, $this->headers);

        return $negotiator->guess($arguments[0]);
    }

    /**
     * @param $name
     * @param array $arguments
     */
    private function checkArguments($name, array $arguments)
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
    }

    /**
     * @param string $name
     * @param array $headers
     * @return \SIAPI\Negotiation\Guesser
     */
    private function getNegotiator($name, array $headers)
    {
        return Factory::build($name, $headers);
    }
}
