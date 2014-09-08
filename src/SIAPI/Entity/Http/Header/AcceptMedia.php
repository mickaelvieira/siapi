<?php

namespace SIAPI\Entity\Http\Header;

/**
 * Class AcceptMedia
 * @package SIAPI\Entity\Http\Header
 */
class AcceptMedia
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
