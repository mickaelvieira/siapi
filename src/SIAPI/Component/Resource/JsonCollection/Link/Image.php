<?php

namespace SIAPI\Component\Resource\JsonCollection\Link;

use CollectionNextJson\Entity\Link;
use CollectionJson\Type\Render;
use CollectionJson\Type\Relation;

class Image extends Link
{
    /**
     * {@inheritdoc}
     */
    protected $rel = Relation::ITEM;

    /**
     * {@inheritdoc}
     */
    protected $render = Render::IMAGE;
}
