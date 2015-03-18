<?php

namespace SIAPI\Component\Resource;

use SIAPI\Component\Search\Query\Params;

/**
 * Class Linker
 * @package SIAPI\Component\Resource
 */
class Linker
{
    /**
     * @var \SIAPI\Component\Resource\Pagination
     */
    private $pagination;

    /**
     * @var \SIAPI\Component\Search\Query\Params
     */
    private $params;

    /**
     * @param \SIAPI\Component\Resource\Pagination $pagination
     * @param \SIAPI\Component\Search\Query\Params $params
     */
    public function __construct(Pagination $pagination, Params $params)
    {
        $this->pagination = $pagination;
        $this->params     = $params;
    }

    /**
     * @return string
     */
    public function getFirstPageUrl()
    {
        return $this->format($this->pagination->getFirstPage());
    }

    /**
     * @return string
     */
    public function getLastPageUrl()
    {
        return $this->format($this->pagination->getLastPage());
    }

    /**
     * @return string
     */
    public function getCurrentPageUrl()
    {
        return $this->format($this->pagination->getCurrentPage());
    }

    /**
     * @return string
     */
    public function getNextPageUrl()
    {
        if (!$this->pagination->getNextPage()) {
            return null;
        }
        return $this->format($this->pagination->getNextPage());
    }

    /**
     * @return string
     */
    public function getPrevPageUrl()
    {
        if (!$this->pagination->getPrevPage()) {
            return null;
        }
        return $this->format($this->pagination->getPrevPage());
    }

    /**
     * @param $page
     * @return string
     */
    private function format($page)
    {
        if ($this->params->count() > 0) {
            return sprintf("%s&page=%s", (string)$this->params, $page);
        } else {
            return sprintf("page=%s", $page);
        }
    }
}
