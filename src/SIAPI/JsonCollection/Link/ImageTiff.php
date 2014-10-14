<?php

namespace SIAPI\JsonCollection\Link;

use SIAPI\JsonCollection\Link;
use SIAPI\JsonCollection\Type;

class ImageTiff extends Link
{
    /**
     * {@inheritdoc}
     */
    protected $rel = Type\Relation::ITEM;

    /**
     * {@inheritdoc}
     */
    protected $type = Type\Media::TIFF;

    /**
     * {@inheritdoc}
     */
    protected $render = Type\Render::IMAGE;
} 