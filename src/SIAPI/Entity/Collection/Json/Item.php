<?php

namespace SIAPI\Entity\Collection\Json;

use JsonSerializable;

/**
 * Class Item
 * @package SIAPI\Entity\Collection\Json
 * @docs http://amundsen.com/media-types/collection/format/
 */
class Item implements JsonSerializable
{
    /**
     * @var string
     */
    private $href;

    /**
     * @var array
     */
    private $data = array();

    /**
     * @var array
     */
    private $links = array();

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
     * @param \SIAPI\Entity\Collection\Json\Data $data
     */
    public function addData(Data $data)
    {
        array_push($this->data, $data);
    }

    /**
     * @param \SIAPI\Entity\Collection\Json\Link $link
     */
    public function addLink(Link $link)
    {
        array_push($this->links, $link);
    }

    /**
     * @return mixed|void
     */
    public function jsonSerialize()
    {
        // @TODO need to write the logic here
    }
}
