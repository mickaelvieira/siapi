<?php

namespace SIAPI\Component\Resource\JsonCollection\Data;

use SIAPI\Component\JsonCollection\Data;

class Spacecraft extends Data
{
    /**
     * {@inheritdoc}
     */
    protected $name = 'spacecraft';

    /**
     * {@inheritdoc}
     */
    protected $prompt = 'Spacecraft';

    /**
     * {@inheritdoc}
     */
    protected $required = false;
} 