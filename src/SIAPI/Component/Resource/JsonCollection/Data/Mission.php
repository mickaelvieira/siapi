<?php

namespace SIAPI\Component\Resource\JsonCollection\Data;

use JsonCollection\Data;

class Mission extends Data
{
    /**
     * {@inheritdoc}
     */
    protected $name = 'mission';

    /**
     * {@inheritdoc}
     */
    protected $prompt = 'Mission';

    /**
     * {@inheritdoc}
     */
    protected $required = false;
}