<?php

namespace SIAPI\Collection;

use JsonSerializable;

/**
 * Class JsonConvertible
 * @package SIAPI\Collection
 */
abstract class JsonConvertible implements JsonSerializable
{
    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return $this->filterNullAndEmptyData(
            $this->getObjectData()
        );
    }

    /**
     * @return mixed
     */
    abstract protected function getObjectData();

    /**
     * @param array $data
     * @return array
     */
    private function filterNullAndEmptyData($data)
    {
        return array_filter(
            $data,
            function ($value) {
                return (!is_null($value) && !empty($value));
            }
        );
    }
}
