<?php

namespace SIAPI\Entity\Http\Header;

/**
 * Class Accept
 * @package SIAPI\Entity\Http\Header
 */
class Accept
{
    /**
     * @var MediaRange
     */
    public $mediaRange;

    /**
     * @var int
     */
    public $quality = 1;

    /**
     * @var int
     */
    public $level;
}
