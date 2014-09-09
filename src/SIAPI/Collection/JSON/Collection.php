<?php

namespace SIAPI\Collection\JSON;

use SIAPI\Collection\JsonConvertible;

/**
 * Class Collection
 * @package SIAPI\Collection\JSON
 * @docs http://amundsen.com/media-types/collection/format/
 * @docs http://code.ge/media-types/collection-next-json/
 */
class Collection extends JsonConvertible
{
    /**
     * @link http://amundsen.com/media-types/collection/format/#properties-version
     */
    const VERSION = "1.0";

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
     * @var \SIAPI\Collection\JSON\Error
     * @link http://amundsen.com/media-types/collection/format/#objects-error
     */
    private $error;

    /**
     * @var \SIAPI\Collection\JSON\Status
     * @link http://code.ge/media-types/collection-next-json/#object-status
     */
    private $status;

    /**
     * @var \SIAPI\Collection\JSON\Template
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
     * @param \SIAPI\Collection\JSON\Link $link
     */
    public function addLink(Link $link)
    {
        array_push($this->links, $link);
    }

    /**
     * @param \SIAPI\Collection\JSON\Item $item
     */
    public function addItem(Item $item)
    {
        array_push($this->items, $item);
    }

    /**
     * @param \SIAPI\Collection\JSON\Query $query
     */
    public function addQuery(Query $query)
    {
        array_push($this->queries, $query);
    }

    /**
     * @param \SIAPI\Collection\JSON\Error $error
     */
    public function setError(Error $error)
    {
        $this->error = $error;
    }

    /**
     * @return \SIAPI\Collection\JSON\Error
     */
    public function getError()
    {
        return $this->error;
    }

    /**
     * @param \SIAPI\Collection\JSON\Status $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return \SIAPI\Collection\JSON\Status
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param \SIAPI\Collection\JSON\Template $template
     */
    public function setTemplate(Template $template)
    {
        $this->template = $template;
    }

    /**
     * @return \SIAPI\Collection\JSON\Template
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
        $data = [
            'version' => self::VERSION
        ];
        return array_merge($data, get_object_vars($this));
    }
}
