<?php

namespace SIAPI\Component\Resource\JsonCollection\Link\Image;

use SIAPI\Component\Resource\JsonCollection\Link;
use CollectionNextJson\Type\Media;

class Tiff extends Link\Image
{
    /**
     * {@inheritdoc}
     */
    protected $type = Media::TIFF;
}
