<?php

namespace SIAPI\Resource\JsonCollection\Item;

use SIAPI\Resource\JsonCollection\Data;
use SIAPI\JsonCollection\Item;

class Image extends Item
{

    public function __construct()
    {
        $this->data = array(
            new Data\Mission(),
            new Data\Target(),
            new Data\Spacecraft(),
            new Data\Instrument(),
            new Data\Source()
        );
    }

    /**
     * @return array
     */
    public function getConfigData()
    {
        return array(
            array(
                'name' => 'mission'
            ),
            array(
                'name' => 'target'
            ),
            array(
                'name' => 'satelliteof'
            ),
            array(
                'name' => 'spacecraft'
            ),
            array(
                'name' => 'instrument'
            ),
            array(
                'name' => 'extra'
            ),
            array(
                'name' => 'source'
            )
        );
    }
} 