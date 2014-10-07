<?php

namespace SIAPI\JsonCollection;

use SIAPI\JsonCollection;

/**
 * Class Error
 * @package SIAPI\JsonJsonCollection
 * @link http://amundsen.com/media-types/collection/format/
 * @link http://code.ge/media-types/collection-next-json/
 */
class Error extends JsonConvertible
{
    /**
     * @var string
     * @link http://amundsen.com/media-types/collection/format/#properties-title
     */
    private $title;

    /**
     * @var string
     * @link http://amundsen.com/media-types/collection/format/#property-code
     */
    private $code;

    /**
     * @var string
     * @link http://amundsen.com/media-types/collection/format/#property-message
     */
    private $message;

    /**
     * @var array
     * @link http://code.ge/media-types/collection-next-json/#array-messages
     */
    private $messages = [];

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
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = (string)$title;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param \SIAPI\JsonCollection\Message $message
     */
    public function addMessage(Message $message)
    {
        array_push($this->messages, $message);
    }

    /**
     * {@inheritdoc}
     */
    protected function getObjectData()
    {
        return get_object_vars($this);
    }
}
