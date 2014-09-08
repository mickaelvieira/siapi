<?php

namespace SIAPI\Entity\Collection\Json;

use SIAPI\Entity\Collection\JsonConvertible;

/**
 * Class ListData
 * @package SIAPI\Entity\Collection\Json
 * @docs http://code.ge/media-types/collection-next-json/
 */
class ListData extends JsonConvertible
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
     * {@inheritdoc}
     */
    protected function getObjectData()
    {
        return get_object_vars($this);
    }
}
