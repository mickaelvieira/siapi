<?php

namespace SIAPI\JsonCollection\Link\Image;

use SIAPI\JsonCollection\Link;
use SIAPI\JsonCollection\Type;

class Tiff extends Link\Image
{
    /**
     * {@inheritdoc}
     */
    protected $type = Type\Media::TIFF;
} 