<?php

namespace SIAPI\Component\Resource\JsonCollection\Data;

use SIAPI\Component\JsonCollection\Data;

class Instrument extends Data
{
    /**
     * {@inheritdoc}
     */
    protected $name = 'instrument';

    /**
     * {@inheritdoc}
     */
    protected $prompt = 'Instrument';

    /**
     * {@inheritdoc}
     */
    protected $required = false;
} 