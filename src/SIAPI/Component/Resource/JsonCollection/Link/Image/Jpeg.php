<?php

namespace SIAPI\Component\Resource\JsonCollection\Link\Image;

use SIAPI\Component\Resource\JsonCollection\Link;
use SIAPI\Component\JsonCollection\Type;

class Jpeg extends Link\Image
{
    /**
     * {@inheritdoc}
     */
    protected $type = Type\Media::JPEG;
} 