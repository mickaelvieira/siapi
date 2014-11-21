<?php

namespace SIAPI\Component\Resource\JsonCollection\Link\Image;

use SIAPI\Component\Resource\JsonCollection\Link;
use CollectionNextJson\Type\Media;

class Jpeg extends Link\Image
{
    /**
     * {@inheritdoc}
     */
    protected $type = Media::JPEG;
}
