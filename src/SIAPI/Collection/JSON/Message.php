<?php

namespace SIAPI\Collection\JSON;

use SIAPI\Collection\JsonConvertible;

/**
 * Class Message
 * @package SIAPI\Collection\JSON
 * @docs http://amundsen.com/media-types/collection/format/
 * @docs http://code.ge/media-types/collection-next-json/
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
        $this->code = (string)$code;
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
        $this->message = (string)$message;
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
        $this->name = (string)$name;
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
