<?php

namespace SIAPI\Entity\Http\Request\Header;

/**
 * Class AcceptBase
 * @package SIAPI\Entity\Http\Request\Header
 */
class AcceptBase
{
    /**
     * @var float
     */
    protected $quality = 1;

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
