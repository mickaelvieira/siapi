<?php

namespace SIAPI\Component\Resource\JsonCollection\Data;

use CollectionNextJson\Entity\Data;

class Source extends Data
{
    /**
     * {@inheritdoc}
     */
    protected $name = 'source';

    /**
     * {@inheritdoc}
     */
    protected $prompt = 'Source';

    /**
     * {@inheritdoc}
     */
    protected $required = false;
}
