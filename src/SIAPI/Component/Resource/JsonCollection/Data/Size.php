<?php


namespace SIAPI\Component\Resource\JsonCollection\Data;

use CollectionNextJson\Entity\Data;

class Size extends Data
{
    /**
     * {@inheritdoc}
     */
    protected $name = 'size';

    /**
     * {@inheritdoc}
     */
    protected $prompt = 'Size';

    /**
     * {@inheritdoc}
     */
    protected $required = true;
}
