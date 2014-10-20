<?php

namespace SIAPI\Resource\JsonCollection\Link;

use SIAPI\JsonCollection\Link;
use SIAPI\JsonCollection\Type;

class Prev extends Link
{
    /**
     * {@inheritdoc}
     */
    protected $rel = Type\Relation::PREV;

    /**
     * {@inheritdoc}
     */
    protected $type = Type\Media::COLLECTION_NEXT_JSON;

    /**
     * {@inheritdoc}
     */
    protected $render = Type\Render::LINK;
} 