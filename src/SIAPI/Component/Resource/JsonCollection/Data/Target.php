<?php

namespace SIAPI\Component\Resource\JsonCollection\Data;

use CollectionNextJson\Entity\Data;

class Target extends Data
{
    /**
     * {@inheritdoc}
     */
    protected $name = 'target';

    /**
     * {@inheritdoc}
     */
    protected $prompt = 'Target';

    /**
     * {@inheritdoc}
     */
    protected $required = false;
}
