<?php

namespace SIAPI\Http\Request\Header;

/**
 * Class MediaRange
 * @package SIAPI\Http\Request\Header
 */
class MediaRange
{
    /**
     * @var string
     */
    private $type;

    /**
     * @var string
     */
    private $subtype;

    /**
     * @param string $subtype
     */
    public function setSubtype($subtype)
    {
        $this->subtype = (string)$subtype;
    }

    /**
     * @return string
     */
    public function getSubtype()
    {
        return $this->subtype;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = (string)$type;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }
}
