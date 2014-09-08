<?php

namespace SIAPI\Entity\Collection\Json;

use JsonSerializable;

/**
 * Class Data
 * @package SIAPI\Entity\Collection\Json
 * @docs http://amundsen.com/media-types/collection/format/
 */
class Data implements JsonSerializable
{
    /**
     * @var string
     */
    private $prompt;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $value;

    /**
     * @var string
     * @docs http://code.ge/media-types/collection-next-json/#properties
     */
    private $type;

    /**
     * @var bool
     * @docs http://code.ge/media-types/collection-next-json/#properties
     */
    private $required;

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
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = (string)$type;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param boolean $required
     */
    public function setRequired($required)
    {
        $this->required = (bool)$required;
    }

    /**
     * @return boolean
     */
    public function isRequired()
    {
        return $this->required;
    }

    /**
     * @return mixed|void
     */
    public function jsonSerialize()
    {
        // @TODO need to write the logic here
    }
}
