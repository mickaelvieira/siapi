<?php

namespace SIAPI\Entity\Collection\Json;

use JsonSerializable;

/**
 * Class ListData
 * @package SIAPI\Entity\Collection\Json
 * @docs http://code.ge/media-types/collection-next-json/
 */
class ListData implements JsonSerializable
{
    /**
     * @var bool
     */
    private $multiple;

    /**
     * @var string
     * @docs http://code.ge/media-types/collection-next-json/#properties
     */
    private $default;

    /**
     * @var array
     */
    private $options = array();

    /**
     * @param boolean $multiple
     */
    public function setMultiple($multiple)
    {
        $this->multiple = (bool)$multiple;
    }

    /**
     * @return boolean
     */
    public function isMultiple()
    {
        return ($this->multiple === true);
    }

    /**
     * @param string $default
     */
    public function setDefault($default)
    {
        $this->default = (string)$default;
    }

    /**
     * @return string
     */
    public function getDefault()
    {
        return $this->default;
    }

    /**
     * @param \SIAPI\Entity\Collection\Json\Option $option
     */
    public function addOption(Option $option)
    {
        array_push($this->options, $option);
    }

    /**
     * @return mixed|void
     */
    public function jsonSerialize()
    {
        // @TODO need to write the logic here
    }
}
