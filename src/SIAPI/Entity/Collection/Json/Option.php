<?php

namespace SIAPI\Entity\Collection\Json;

use JsonSerializable;

/**
 * Class Option
 * @package SIAPI\Entity\Collection\Json
 * @docs http://code.ge/media-types/collection-next-json/
 */
class Option implements JsonSerializable
{
    /**
     * @var string
     */
    private $value;

    /**
     * @var string
     */
    private $prompt;

    /**
     * @param string $prompt
     */
    public function setPrompt($prompt)
    {
        $this->prompt = (string)$prompt;
    }

    /**
     * @return string
     */
    public function getPrompt()
    {
        return $this->prompt;
    }

    /**
     * @param string $value
     */
    public function setValue($value)
    {
        $this->value = (string)$value;
    }

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @return mixed|void
     */
    public function jsonSerialize()
    {
        // @TODO need to write the logic here
    }
}
