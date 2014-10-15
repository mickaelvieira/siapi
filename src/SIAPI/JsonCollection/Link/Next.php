<?php

namespace SIAPI\JsonCollection\Link;

use SIAPI\JsonCollection\Link;
use SIAPI\JsonCollection\Type;

class Next extends Link
{
    /**
     * {@inheritdoc}
     */
    protected $rel = Type\Relation::NEXT;

    /**
     * {@inheritdoc}
     */
    protected $type = Type\Media::COLLECTION_NEXT_JSON;

    /**
     * {@inheritdoc}
     */
    protected $render = Type\Render::LINK;
} 