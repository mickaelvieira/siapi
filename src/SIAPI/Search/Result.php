<?php

namespace SIAPI\Search;

use JsonSerializable;
use SIAPI\ArrayConvertible;

class Result implements ArrayConvertible, JsonSerializable
{
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
     * @return array
     */
    public function jsonSerialize()
    {
        return get_object_vars($this);
    }
} 