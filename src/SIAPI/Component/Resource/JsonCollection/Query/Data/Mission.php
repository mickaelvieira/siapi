<?php

namespace SIAPI\Component\Resource\JsonCollection\Query\Data;

use SIAPI\Component\Resource\JsonCollection\Data\Mission as DataMission;
use SIAPI\Component\Resource\JsonCollection\Query\ListData\Mission as ListDataMission;

class Mission extends DataMission
{
    /**
     * {@inheritdoc}
     */
    protected $value = '';

    public function __construct()
    {
        $this->list = new ListDataMission();
    }
}
