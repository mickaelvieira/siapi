<?php

namespace SIAPI\JsonCollection\Link;

use SIAPI\JsonCollection\Link;
use SIAPI\JsonCollection\Type\Media as MediaType;
use SIAPI\JsonCollection\Type\Render as RenderType;
use SIAPI\JsonCollection\Type\Relation as RelationType;

class ImageJpeg extends Link
{
    /**
     * {@inheritdoc}
     */
    protected $rel = RelationType::ITEM;

    /**
     * {@inheritdoc}
     */
    protected $type = MediaType::JPEG;

    /**
     * {@inheritdoc}
     */
    protected $render = RenderType::IMAGE;
} 