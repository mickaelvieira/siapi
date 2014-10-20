<?php

namespace SIAPI\Component\JsonCollection;

use JsonSerializable;
use SIAPI\Component\ArrayConvertible;

/**
 * Class JsonConvertible
 * @package SIAPI\Component\JsonCollection
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
        $data = $this->getObjectData();
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
}