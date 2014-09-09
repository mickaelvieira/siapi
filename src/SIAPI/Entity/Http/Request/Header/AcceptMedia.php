<?php

namespace SIAPI\Entity\Http\Request\Header;

/**
 * Class AcceptMedia
 * @package SIAPI\Entity\Http\Request\Header
 */
class AcceptMedia extends AcceptBase
{
    /**
     * @var \SIAPI\Entity\Http\Request\Header\ValueRange
     */
    private $mediaRange;

    /**
     * @var int
     */
    private $level;

    /**
     * @param int $level
     */
    public function setLevel($level)
    {
        $this->level = (int)$level;
    }

    /**
     * @return int
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * @param \SIAPI\Entity\Http\Request\Header\ValueRange $mediaRange
     */
    public function setMediaRange(ValueRange $mediaRange)
    {
        $this->mediaRange = $mediaRange;
    }

    /**
     * @return \SIAPI\Entity\Http\Request\Header\MediaRange
     */
    public function getMediaRange()
    {
        return $this->mediaRange;
    }
}
