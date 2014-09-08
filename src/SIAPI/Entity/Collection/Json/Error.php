<?php

namespace SIAPI\Entity\Collection\Json;

use JsonSerializable;

/**
 * Class Error
 * @package SIAPI\Entity\Collection\Json
 * @docs http://amundsen.com/media-types/collection/format/
 */
class Error implements JsonSerializable
{
    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $code;

    /**
     * @var string
     */
    private $message;

    /**
     * @var array
     * @docs http://code.ge/media-types/collection-next-json/#arrays
     */
    private $messages = array();

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
     * @param \SIAPI\Entity\Collection\Json\Message $message
     */
    public function addMessage(Message $message)
    {
        array_push($this->messages, $message);
    }

    /**
     * @return mixed|void
     */
    public function jsonSerialize()
    {
        // @TODO need to write the logic here
    }
}
