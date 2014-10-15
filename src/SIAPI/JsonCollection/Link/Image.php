<?php

namespace SIAPI\JsonCollection\Link;

use SIAPI\JsonCollection\Link;
use SIAPI\JsonCollection\Type;

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