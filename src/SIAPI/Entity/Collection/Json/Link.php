<?php

namespace SIAPI\Entity\Collection\Json;

use JsonSerializable;

/**
 * Class Link
 * @package SIAPI\Entity\Collection\Json
 * @docs http://amundsen.com/media-types/collection/format/
 */
class Link implements JsonSerializable
{
    /**
     * @var string
     */
    private $href;

    /**
     * @var string
     */
    private $rel;

    /**
     * @var string
     * @docs http://code.ge/media-types/collection-next-json/#properties
     */
    private $type;

    /**
     * @param string $href
     */
    public function setHref($href)
    {
        $this->href = (string)$href;
    }

    /**
     * @return string
     */
    public function getHref()
    {
        return $this->href;
    }

    /**
     * @param string $rel
     */
    public function setRel($rel)
    {
        $this->rel = (string)$rel;
    }

    /**
     * @return string
     */
    public function getRel()
    {
        return $this->rel;
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

    /**
     * @return mixed|void
     */
    public function jsonSerialize()
    {
        // @TODO need to write the logic here
    }
}
