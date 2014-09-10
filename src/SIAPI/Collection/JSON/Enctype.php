<?php

namespace SIAPI\Collection\JSON;

use SIAPI\Collection\JsonConvertible;

/**
 * Class Method
 * @package SIAPI\Collection\JSON
 * @link http://amundsen.com/media-types/collection/format/
 * @link http://code.ge/media-types/collection-next-json/
 */
class Enctype extends JsonConvertible
{
    /**
     * @var array
     * @link http://code.ge/media-types/collection-next-json/#array-options
     */
    private $options = [];

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
