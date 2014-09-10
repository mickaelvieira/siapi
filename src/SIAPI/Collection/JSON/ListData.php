<?php

namespace SIAPI\Collection\JSON;

use SIAPI\Collection\JsonConvertible;

/**
 * Class ListData
 * @package SIAPI\Collection\JSON
 * @link http://amundsen.com/media-types/collection/format/
 * @link http://code.ge/media-types/collection-next-json/
 */
class ListData extends JsonConvertible
{
    /**
     * @var bool
     * @link http://code.ge/media-types/collection-next-json/#property-multiple
     */
    private $multiple;

    /**
     * @var string
     * @link http://code.ge/media-types/collection-next-json/#property-default
     */
    private $default;

    /**
     * @var array
     * @link http://code.ge/media-types/collection-next-json/#array-options
     */
    private $options = [];

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
        return (bool)$this->multiple;
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
     * @param \SIAPI\Collection\JSON\Option $option
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
