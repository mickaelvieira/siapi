<?php

namespace SIAPI\Component\Resource\JsonCollection\Link;

use JsonCollection\Link;
use JsonCollection\Type;

class Image extends Link
{
    /**
     * {@inheritdoc}
     */
    protected $rel = Type\Relation::ITEM;

    /**
     * {@inheritdoc}
     */
    protected $render = Type\Render::IMAGE;
}