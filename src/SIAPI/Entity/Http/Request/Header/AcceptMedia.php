<?php

namespace SIAPI\Entity\Http\Request\Header;

/**
 * Class AcceptMedia
 * @package SIAPI\Entity\Http\Request\Header
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
