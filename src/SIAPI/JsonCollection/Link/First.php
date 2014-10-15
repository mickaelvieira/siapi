<?php

namespace SIAPI\JsonCollection\Link;

use SIAPI\JsonCollection\Link;
use SIAPI\JsonCollection\Type;

class First extends Link
{
    /**
     * {@inheritdoc}
     */
    protected $rel = Type\Relation::FIRST;

    /**
     * {@inheritdoc}
     */
    protected $type = Type\Media::COLLECTION_NEXT_JSON;

    /**
     * {@inheritdoc}
     */
    protected $render = Type\Render::LINK;
} 