<?php

namespace SIAPI\JsonCollection;

use SIAPI\JsonCollection;

/**
 * Class Message
 * @package SIAPI\JsonJsonCollection
 * @link http://amundsen.com/media-types/collection/format/
 * @link http://code.ge/media-types/collection-next-json/
 */
class Message extends JsonConvertible
{
    /**
     * @var string
     * @link http://amundsen.com/media-types/collection/format/#properties-code
     */
    private $code;

    /**
     * @var string
     * @link http://amundsen.com/media-types/collection/format/#properties-name
     */
    private $name;

    /**
     * @var string
     * @link http://amundsen.com/media-types/collection/format/#properties-message
     */
    private $message;

    /**
     * @param string $code
     */
    public function setCode($code)
    {
        if (is_string($code)) {
            $this->code = $code;
        }
    }

    /**
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param string $message
     */
    public function setMessage($message)
    {
        if (is_string($message)) {
            $this->message = $message;
        }
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        if (is_string($name)) {
            $this->name = $name;
        }
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * {@inheritdoc}
     */
    protected function getObjectData()
    {
        return get_object_vars($this);
    }
}
