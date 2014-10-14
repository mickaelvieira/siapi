<?php

namespace SIAPI\JsonCollection\Link;

use SIAPI\JsonCollection\Link;
use SIAPI\JsonCollection\Type;

class ImageJpeg extends Link
{
    /**
     * {@inheritdoc}
     */
    protected $rel = Type\Relation::ITEM;

    /**
     * {@inheritdoc}
     */
    protected $type = Type\Media::JPEG;

    /**
     * {@inheritdoc}
     */
    protected $render = Type\Render::IMAGE;
} 