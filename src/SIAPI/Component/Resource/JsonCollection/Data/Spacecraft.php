<?php

namespace SIAPI\Component\Resource\JsonCollection\Data;

use CollectionNextJson\Entity\Data;

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
