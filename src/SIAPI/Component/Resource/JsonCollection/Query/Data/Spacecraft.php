<?php

namespace SIAPI\Component\Resource\JsonCollection\Query\Data;

use SIAPI\Component\Resource\JsonCollection\Data\Spacecraft as DataSpacecraft;
use SIAPI\Component\Resource\JsonCollection\Query\ListData\Spacecraft as ListDataSpacecraft;

class Spacecraft extends DataSpacecraft
{
    /**
     * {@inheritdoc}
     */
    protected $value = '';

    public function __construct()
    {
        $this->list = new ListDataSpacecraft();
    }
} 