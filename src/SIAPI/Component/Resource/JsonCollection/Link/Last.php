<?php

namespace SIAPI\Component\Resource\JsonCollection\Link;

use CollectionNextJson\Entity\Link;
use CollectionJson\Type\Render;
use CollectionJson\Type\Relation;
use CollectionNextJson\Type\Media;

class Last extends Link
{
    /**
     * {@inheritdoc}
     */
    protected $rel = Relation::LAST;

    /**
     * {@inheritdoc}
     */
    protected $type = Media::COLLECTION_NEXT_JSON;

    /**
     * {@inheritdoc}
     */
    protected $render = Render::LINK;
}
