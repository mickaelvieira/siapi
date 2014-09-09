<?php

namespace SIAPI\Http\Request\Header;

/**
 * Class AcceptMedia
 * @package SIAPI\Http\Request\Header
 */
class AcceptMedia extends AcceptBase
{
    /**
     * @var \SIAPI\Http\Request\Header\ValueRange
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
     * @param \SIAPI\Http\Request\Header\ValueRange $mediaRange
     */
    public function setMediaRange(ValueRange $mediaRange)
    {
        $this->mediaRange = $mediaRange;
    }

    /**
     * @return \SIAPI\Http\Request\Header\MediaRange
     */
    public function getMediaRange()
    {
        return $this->mediaRange;
    }
}
