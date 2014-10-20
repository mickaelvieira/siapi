<?php

namespace SIAPI\Component\Resource\JsonCollection\Link;

use SIAPI\Component\JsonCollection\Link;
use SIAPI\Component\JsonCollection\Type;

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