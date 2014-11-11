<?php

namespace SIAPI\Component\Resource\JsonCollection\Item;

use SIAPI\Component\Resource\JsonCollection\Data;
use JsonCollection\Item;

class Image extends Item
{

    public function __construct()
    {
        $this->addData(new Data\Mission());
        $this->addData(new Data\Target());
        $this->addData(new Data\Spacecraft());
        $this->addData(new Data\Instrument());
        $this->addData(new Data\Source());
    }

    /**
     * @param string $name
     * @param string $value
     */
    public function setDataValue($name, $value)
    {
        $data = $this->getDataByName($name);
        if ($data) {
            $data->setValue($value);
        }
    }

    /**
     * @param string $name
     * @return null|\JsonCollection\Data
     */
    public function getDataByName($name)
    {
        $entity = null;
        foreach ($this->getDataSet() as $data) {
            /** @var \JsonCollection\Data $data */
            if ($data->getName() === $name) {
                $entity = $data;
                break;
            }
        }
        return $entity;
    }
} 