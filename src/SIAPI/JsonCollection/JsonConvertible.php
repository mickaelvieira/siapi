<?php

namespace SIAPI\JsonCollection;

use JsonSerializable;
use SIAPI\ArrayConvertible;

/**
 * Class JsonConvertible
 * @package SIAPI\JsonCollection
 */
abstract class JsonConvertible implements JsonSerializable, ArrayConvertible
{
    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return $this->getObjectData();
    }

    /**
     * @return array
     */
    public function toArray()
    {
        $data = get_object_vars($this);
        array_walk(
            $data,
            function (&$value) {
                if (is_object($value) && $value instanceof ArrayConvertible) {
                    $value = $value->toArray();
                }
            }
        );
        return $data;
    }

    /**
     * @return mixed
     */
    abstract protected function getObjectData();

    /**
     * @param array $data
     * @return array
     */
    private function filterNullValueAndEmptyArray($data)
    {
        return array_filter(
            $data,
            function ($value) {
                if (is_array($value)) {
                    return !empty($value);
                }
                return (!is_null($value));
            }
        );
    }
}
