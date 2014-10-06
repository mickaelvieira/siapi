<?php

namespace SIAPI\Negotiation;

/**
 * Class Negotiation
 * @package SIAPI\Negotiation
 * @link http://www.w3.org/Protocols/rfc2616/rfc2616-sec12
 * - Server-driven Negotiation
 * - Agent-driven Negotiation
 *
 * @method media
 * @method charset
 * @method language
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

        $negotiator = $this->getNegotiator($name, self::getAcceptHeaderValue($name));

        return $negotiator->negotiate($arguments[0]);
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
     * @param string $headerValue
     * @return \SIAPI\Negotiation\Negotiator
     */
    private function getNegotiator($name, $headerValue)
    {
        return Factory::build($name, $headerValue);
    }

    /**
     * @param string $name
     * @return string
     */
    private function getAcceptHeaderValue($name)
    {
        $type = null;
        switch ($name) {
            case 'media':
                $type = 'Accept';
                break;
            case 'charset':
                $type = 'Accept-Charset';
                break;
            case 'language':
                $type = 'Accept-Language';
                break;
        }
        return ($type && array_key_exists($type, $this->headers)) ? $this->headers[$type] : '';
    }
}
