<?php

namespace SIAPI\Component\JsonCollection;

use SIAPI\Component\JsonCollection;

/**
 * Class JsonCollection
 * @package SIAPI\Component\JsonJsonCollection
 * @link http://amundsen.com/media-types/collection/format/
 * @link http://code.ge/media-types/collection-next-json/
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
     * @var \SIAPI\Component\JsonCollection\Error
     * @link http://amundsen.com/media-types/collection/format/#objects-error
     */
    private $error;

    /**
     * @var \SIAPI\Component\JsonCollection\Status
     * @link http://code.ge/media-types/collection-next-json/#object-status
     */
    private $status;

    /**
     * @var \SIAPI\Component\JsonCollection\Template
     * @link http://amundsen.com/media-types/collection/format/#ojects-template
     */
    private $template;

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
     * @param \SIAPI\Component\JsonCollection\Link $link
     */
    public function addLink(Link $link)
    {
        array_push($this->links, $link);
    }

    /**
     * @param \SIAPI\Component\JsonCollection\Item $item
     */
    public function addItem(Item $item)
    {
        array_push($this->items, $item);
    }

    /**
     * @param \SIAPI\Component\JsonCollection\Query $query
     */
    public function addQuery(Query $query)
    {
        array_push($this->queries, $query);
    }

    /**
     * @param \SIAPI\Component\JsonCollection\Error $error
     */
    public function setError(Error $error)
    {
        $this->error = $error;
    }

    /**
     * @return \SIAPI\Component\JsonCollection\Error
     */
    public function getError()
    {
        return $this->error;
    }

    /**
     * @param \SIAPI\Component\JsonCollection\Status $status
     */
    public function setStatus(Status $status)
    {
        $this->status = $status;
    }

    /**
     * @return \SIAPI\Component\JsonCollection\Status
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param \SIAPI\Component\JsonCollection\Template $template
     */
    public function setTemplate(Template $template)
    {
        $this->template = $template;
    }

    /**
     * @return \SIAPI\Component\JsonCollection\Template
     */
    public function getTemplate()
    {
        return $this->template;
    }

    /**
     * {@inheritdoc}
     * @TODO the official output MUST be
     * { "collection" : { "href" : "...", "items" [ { "href" : "...", "data" : [...].} } }
     * But the 'collection' key should add elsewhere
     */
    protected function getObjectData()
    {
        $data = [
            'version' => self::VERSION
        ];
        $data = array_merge($data, get_object_vars($this));

        return array_filter(
            $data,
            function ($value) {
                if (is_array($value)) {
                    return !empty($value);
                }
                return !is_null($value);
            }
        );
    }
}
