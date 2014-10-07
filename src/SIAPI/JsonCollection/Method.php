<?php

namespace SIAPI\JsonCollection;

use SIAPI\JsonCollection;

/**
 * Class Method
 * @package SIAPI\JsonJsonCollection
 * @link http://amundsen.com/media-types/collection/format/
 * @link http://code.ge/media-types/collection-next-json/
 */
class Method extends JsonConvertible
{
    /**
     * @var array
     * @link http://code.ge/media-types/collection-next-json/#array-options
     */
    private $options = [];

    /**
     * @param \SIAPI\JsonCollection\Option $option
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
