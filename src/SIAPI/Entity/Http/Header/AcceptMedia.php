<?php

namespace SIAPI\Entity\Http\Header;

/**
 * Class AcceptMedia
 * @package SIAPI\Entity\Http\Header
 */
class AcceptMedia extends AcceptBase
{
    /**
     * @var MediaRange
     */
    public $mediaRange;

    /**
     * @var int
     */
    public $level;
}
