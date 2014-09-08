<?php

namespace SIAPI\Entity\Collection\Json;

use JsonSerializable;

/**
 * Class Collection
 * @package SIAPI\Entity\Collection\Json
 * @docs http://amundsen.com/media-types/collection/format/
 */
class Collection implements JsonSerializable
{
    /**
     * @var string
     */
    private $version = "1.0";

    /**
     * @var string
     */
    private $href;

    /**
     * @var array
     */
    private $links = array();

    /**
     * @var array
     */
    private $items = array();

    /**
     * @var array
     */
    private $queries = array();

    /**
     * @var \SIAPI\Entity\Collection\Json\Error
     */
    private $error;

    /**
     * @var \SIAPI\Entity\Collection\Json\Status
     * @docs http://code.ge/media-types/collection-next-json/
     */
    private $status;

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
     * @param \SIAPI\Entity\Collection\Json\Link $link
     */
    public function addLink(Link $link)
    {
        array_push($this->links, $link);
    }

    /**
     * @param \SIAPI\Entity\Collection\Json\Item $item
     */
    public function addItem(Item $item)
    {
        array_push($this->items, $item);
    }

    /**
     * @param \SIAPI\Entity\Collection\Json\Query $query
     */
    public function addQuery(Query $query)
    {
        array_push($this->queries, $query);
    }

    /**
     * @param \SIAPI\Entity\Collection\Json\Error $error
     */
    public function setError(Error $error)
    {
        $this->error = $error;
    }

    /**
     * @return \SIAPI\Entity\Collection\Json\Error
     */
    public function getError()
    {
        return $this->error;
    }

    /**
     * @param \SIAPI\Entity\Collection\Json\Status $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return \SIAPI\Entity\Collection\Json\Status
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @return mixed|void
     */
    public function jsonSerialize()
    {
        // @TODO need to write the logic here
        return [
            'version' => $this->version
        ];
    }
}
