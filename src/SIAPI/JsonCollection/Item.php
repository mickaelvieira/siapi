<?php

namespace SIAPI\JsonCollection;

use SIAPI\JsonCollection;

/**
 * Class Item
 * @package SIAPI\JsonJsonCollection
 * @link http://amundsen.com/media-types/collection/format/
 * @link http://code.ge/media-types/collection-next-json/
 */
class Item extends JsonConvertible implements DataContainer
{
    /**
     * @var string
     * @link http://amundsen.com/media-types/collection/format/#property-href
     */
    protected $href;

    /**
     * @var array
     * @link http://amundsen.com/media-types/collection/format/#arrays-data
     */
    protected $data = [];

    /**
     * @var array
     * @link http://amundsen.com/media-types/collection/format/#arrays-links
     */
    protected $links = [];

    /**
     * @param string $href
     */
    public function setHref($href)
    {
        if (is_string($href)) {
            $this->href = $href;
        }
    }

    /**
     * @return string
     */
    public function getHref()
    {
        return $this->href;
    }

    /**
     * @param \SIAPI\JsonCollection\Data $data
     */
    public function addData(Data $data)
    {
        array_push($this->data, $data);
    }

    /**
     * @return array
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param \SIAPI\JsonCollection\Link $link
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
        $data = get_object_vars($this);
        return array_filter(
            $data,
            function ($value) {
                if (is_array($value)) {
                    return !empty($value);
                }
                return $value;
            }
        );
    }

    /**
     * {@inheritdoc}
     */
    public function getConfigData()
    {
        return array();
    }
}
