<?php

namespace SIAPI\Resource\JsonCollection\Item;

use SIAPI\Resource\JsonCollection\Data;
use SIAPI\JsonCollection\Item;

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
} 