<?php

namespace SIAPI\Resource\JsonCollection\Link\Image;

use SIAPI\Resource\JsonCollection\Link;
use SIAPI\JsonCollection\Type;

class Tiff extends Link\Image
{
    /**
     * {@inheritdoc}
     */
    protected $type = Type\Media::TIFF;
} 