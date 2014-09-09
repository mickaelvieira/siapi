<?php

namespace SIAPI\Entity\Collection\Json;

use SIAPI\Entity\Collection\JsonConvertible;

/**
 * Class Collection
 * @package SIAPI\Entity\Collection\Json
 * @docs http://amundsen.com/media-types/collection/format/
 * @docs http://code.ge/media-types/collection-next-json/
 */
class Collection extends JsonConvertible
{
    /**
     * @var string
     * @link http://amundsen.com/media-types/collection/format/#properties-version
     */
    private $version = "1.0";

    /**
     * @var string
     * @link http://amundsen.com/media-types/collection/format/#properties-href
     */
    private $href;

    /**
     * @var array
     * @link http://amundsen.com/media-types/collection/format/#arrays-links
     */
    private $links = [];

    /**
     * @var array
     * @link http://amundsen.com/media-types/collection/format/#arrays-items
     */
    private $items = [];

    /**
     * @var array
     * @link http://amundsen.com/media-types/collection/format/#arrays-queries
     */
    private $queries = [];

    /**
     * @var \SIAPI\Entity\Collection\Json\Error
     * @link http://amundsen.com/media-types/collection/format/#objects-error
     */
    private $error;

    /**
     * @var \SIAPI\Entity\Collection\Json\Status
     * @link http://code.ge/media-types/collection-next-json/#object-status
     */
    private $status;

    /**
     * @var \SIAPI\Entity\Collection\Json\Template
     * @link http://amundsen.com/media-types/collection/format/#ojects-template
     */
    private $template;

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
     * @param \SIAPI\Entity\Collection\Json\Template $template
     */
    public function setTemplate(Template $template)
    {
        $this->template = $template;
    }

    /**
     * @return \SIAPI\Entity\Collection\Json\Template
     */
    public function getTemplate()
    {
        return $this->template;
    }

    /**
     * {@inheritdoc}
     */
    protected function getObjectData()
    {
        return get_object_vars($this);
    }
}
