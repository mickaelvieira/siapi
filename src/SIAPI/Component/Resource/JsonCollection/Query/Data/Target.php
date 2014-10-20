<?php

namespace SIAPI\Component\Resource\JsonCollection\Query\Data;

use SIAPI\Component\Resource\JsonCollection\Data\Target as DataTarget;
use SIAPI\Component\Resource\JsonCollection\Query\ListData\Target as ListDataTarget;

class Target extends DataTarget
{
    /**
     * {@inheritdoc}
     */
    protected $value = '';

    public function __construct()
    {
        $this->list = new ListDataTarget();
    }
} 