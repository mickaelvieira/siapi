<?php

namespace SIAPI\Http\Request\Header;

/**
 * Class AcceptBase
 * @package SIAPI\Http\Request\Header
 */
class AcceptBase
{
    /**
     * @var float
     */
    protected $quality = 1.0;

    /**
     * @param float $quality
     */
    public function setQuality($quality)
    {
        $this->quality = (float)$quality;
    }

    /**
     * @return float
     */
    public function getQuality()
    {
        return $this->quality;
    }
}
