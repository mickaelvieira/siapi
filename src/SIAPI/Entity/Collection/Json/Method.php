<?php

namespace SIAPI\Entity\Collection\Json;

use JsonSerializable;

/**
 * Class Method
 * @package SIAPI\Entity\Collection\Json
 * @docs http://code.ge/media-types/collection-next-json/
 */
class Method implements JsonSerializable
{
    /**
     * @var array
     */
    private $options = array();

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
