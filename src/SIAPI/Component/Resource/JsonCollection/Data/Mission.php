<?php

namespace SIAPI\Component\Resource\JsonCollection\Data;

use CollectionNextJson\Entity\Data;

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
