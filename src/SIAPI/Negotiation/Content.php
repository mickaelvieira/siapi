<?php

namespace SIAPI\Negotiation;

class Content implements Negotiation
{
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
     * {@inheritdoc}
     */
    public function getMedia(array $arguments)
    {
        $negotiator = $this->getNegotiator('media');
        return $negotiator->negotiate($arguments[0]);
    }

    /**
     * {@inheritdoc}
     */
    public function getLanguage(array $arguments)
    {
        $negotiator = $this->getNegotiator('language');
        return $negotiator->negotiate($arguments[0]);
    }

    /**
     * {@inheritdoc}
     */
    public function getCharset(array $arguments)
    {
        $negotiator = $this->getNegotiator('charset');
        return $negotiator->negotiate($arguments[0]);
    }

    /**
     * @param string $name
     * @return \SIAPI\Negotiation\Negotiator
     */
    private function getNegotiator($name)
    {
        $headerValue = self::getAcceptHeaderValue($name);
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