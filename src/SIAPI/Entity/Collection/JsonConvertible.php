<?php

namespace SIAPI\Entity\Collection;

use JsonSerializable;

abstract class JsonConvertible implements JsonSerializable
{
    /**
     * @param array $properties
     * @return array
     */
    private function filterNullAndEmptyProperties($properties)
    {
        $data = [];
        foreach ($properties as $name => $value) {
            if (!is_null($value) && !empty($value)) {
                $data[$name] = $value;
            }
        }
        return $data;
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return $this->filterNullAndEmptyProperties(
            $this->getObjectData()
        );
    }

    /**
     * @return mixed
     */
    abstract protected function getObjectData();
}
