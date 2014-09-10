<?php

namespace SIAPI\Collection\JSON;

use SIAPI\Collection\JsonConvertible;

/**
 * Class Data
 * @package SIAPI\Collection\JSON
 * @link http://amundsen.com/media-types/collection/format/
 * @link http://code.ge/media-types/collection-next-json/
 */
class Data extends JsonConvertible
{
    /**
     * @var string
     * @link http://amundsen.com/media-types/collection/format/#properties-prompt
     */
    private $prompt;

    /**
     * @var string
     * @link http://amundsen.com/media-types/collection/format/#properties-name
     */
    private $name;

    /**
     * @var string
     * @link http://amundsen.com/media-types/collection/format/#properties-value
     */
    private $value;

    /**
     * @var string
     * @link http://code.ge/media-types/collection-next-json/#property-type
     */
    private $type;

    /**
     * @var bool
     * @link http://code.ge/media-types/collection-next-json/#property-required
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
     * {@inheritdoc}
     */
    protected function getObjectData()
    {
        return get_object_vars($this);
    }
}
