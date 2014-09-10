<?php

namespace SIAPI\Collection\JSON;

use SIAPI\Collection\JsonConvertible;

/**
 * Class Item
 * @package SIAPI\Collection\JSON
 * @link http://amundsen.com/media-types/collection/format/
 * @link http://code.ge/media-types/collection-next-json/
 */
class Item extends JsonConvertible
{
    /**
     * @var string
     * @link http://amundsen.com/media-types/collection/format/#property-href
     */
    private $href;

    /**
     * @var array
     * @link http://amundsen.com/media-types/collection/format/#arrays-data
     */
    private $data = [];

    /**
     * @var array
     * @link http://amundsen.com/media-types/collection/format/#arrays-links
     */
    private $links = [];

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
     * @param \SIAPI\Collection\JSON\Data $data
     */
    public function addData(Data $data)
    {
        array_push($this->data, $data);
    }

    /**
     * @param \SIAPI\Collection\JSON\Link $link
     */
    public function addLink(Link $link)
    {
        array_push($this->links, $link);
    }

    /**
     * {@inheritdoc}
     */
    protected function getObjectData()
    {
        return get_object_vars($this);
    }
}
