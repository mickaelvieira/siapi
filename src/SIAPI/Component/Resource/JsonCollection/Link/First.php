<?php

namespace SIAPI\Component\Resource\JsonCollection\Link;

use CollectionNextJson\Entity\Link;
use CollectionJson\Type\Render;
use CollectionJson\Type\Relation;
use CollectionNextJson\Type\Media;

class First extends Link
{
    /**
     * {@inheritdoc}
     */
    protected $rel = Relation::FIRST;

    /**
     * {@inheritdoc}
     */
    protected $type = Media::COLLECTION_NEXT_JSON;

    /**
     * {@inheritdoc}
     */
    protected $render = Render::LINK;
}
