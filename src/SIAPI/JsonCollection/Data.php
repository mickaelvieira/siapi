<?php

namespace SIAPI\JsonCollection;

/**
 * Class Data
 * @package SIAPI\JsonJsonCollection
 * @link http://amundsen.com/media-types/collection/format/
 * @link http://code.ge/media-types/collection-next-json/
 */
class Data extends JsonConvertible
{
    /**
     * @var string
     * @link http://amundsen.com/media-types/collection/format/#properties-prompt
     */
    protected $prompt;

    /**
     * @var string
     * @link http://amundsen.com/media-types/collection/format/#properties-name
     */
    protected $name;

    /**
     * @var string
     * @link http://amundsen.com/media-types/collection/format/#properties-value
     */
    protected $value;

    /**
     * @var string
     * @link http://code.ge/media-types/collection-next-json/#property-type
     */
    protected $type;

    /**
     * @var bool
     * @link http://code.ge/media-types/collection-next-json/#property-required
     */
    protected $required;

    /**
     * @var \SIAPI\JsonCollection\ListData
     * @link http://code.ge/media-types/collection-next-json/#object-list
     */
    protected $list;

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
     * @param string $prompt
     */
    public function setPrompt($prompt)
    {
        if (is_string($prompt)) {
            $this->prompt = $prompt;
        }
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
        if (is_string($value)) {
            $this->value = $value;
        }
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
        if (is_string($type)) {
            $this->type = $type;
        }
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
        if (is_bool($required)) {
            $this->required = $required;
        }
    }

    /**
     * @return boolean
     */
    public function isRequired()
    {
        return (bool)$this->required;
    }

    /**
     * @return \SIAPI\JsonCollection\ListData
     */
    public function getList()
    {
        return $this->list;
    }

    /**
     * @param \SIAPI\JsonCollection\ListData $list
     */
    public function setList(ListData $list)
    {
        $this->list = $list;
    }

    /**
     * {@inheritdoc}
     */
    protected function getObjectData()
    {
        $filtered = array();
        $data = get_object_vars($this);

        array_walk(
            $data,
            function ($value, $key) use (&$filtered) {
                if (!is_null($value) || $key === 'value') {
                    $filtered[$key] = $value;
                }
            }
        );
        return $filtered;
    }
}
