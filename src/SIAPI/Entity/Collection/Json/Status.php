<?php

namespace SIAPI\Entity\Collection\Json;

use JsonSerializable;

/**
 * Class Status
 * @package SIAPI\Entity\Collection\Json
 * @docs http://code.ge/media-types/collection-next-json/
 */
class Status implements JsonSerializable
{
    /**
     * @var string
     */
    private $code;

    /**
     * @var string
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
     * @return mixed|void
     */
    public function jsonSerialize()
    {
        // @TODO need to write the logic here
    }
}
