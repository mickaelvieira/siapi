<?php

namespace SIAPI\Component\Resource\JsonCollection\Query\Data;

use SIAPI\Component\Resource\JsonCollection\Data\Instrument as DataInstrument;
use SIAPI\Component\Resource\JsonCollection\Query\ListData\Instrument as ListDataInstrument;

class Instrument extends DataInstrument
{
    /**
     * {@inheritdoc}
     */
    protected $value = '';

    public function __construct()
    {
        $this->list = new ListDataInstrument();
    }
} 