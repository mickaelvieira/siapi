<?php

namespace SIAPI\Component\Resource\JsonCollection\Data;

use CollectionNextJson\Entity\Data;

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
