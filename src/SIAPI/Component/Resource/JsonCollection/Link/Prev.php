<?php

namespace SIAPI\Component\Resource\JsonCollection\Link;

use JsonCollection\Link;
use JsonCollection\Type;

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