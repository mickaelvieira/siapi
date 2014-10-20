<?php

namespace SIAPI\Component\Negotiation;

use Psr\Http\Message\MessageInterface;

class Content implements Negotiation
{
    /**
     * @var array
     */
    private $message = [];

    /**
     * @param MessageInterface $message
     */
    public function __construct(MessageInterface $message)
    {
        $this->message = $message;
    }

    /**
     * {@inheritdoc}
     */
    public function getMedia(array $supported)
    {
        return $this->negotiate('media', $supported);
    }

    /**
     * {@inheritdoc}
     */
    public function getLanguage(array $supported)
    {
        return $this->negotiate('language', $supported);
    }

    /**
     * {@inheritdoc}
     */
    public function getCharset(array $supported)
    {
        return $this->negotiate('charset', $supported);
    }

    /**
     * @param string $name
     * @param array $supported
     * @return null|string
     */
    private function negotiate($name, array $supported)
    {
        $negotiator = $this->getNegotiator($name);
        return $negotiator->negotiate($supported);
    }

    /**
     * @param string $name
     * @return \SIAPI\Component\Negotiation\Negotiator
     */
    private function getNegotiator($name)
    {
        $headerValue = $this->getAcceptHeaderValues($name);
        return Factory::build($name, $headerValue);
    }

    /**
     * @param string $name
     * @return string
     */
    private function getAcceptHeaderValues($name)
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
        return ($type && $this->message->hasHeader($type)) ?
            $this->message->getHeader($type) : '';
    }
} 