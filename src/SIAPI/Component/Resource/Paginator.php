<?php

namespace SIAPI\Component\Resource;

/**
 * Class Paginator
 * @package SIAPI\Component\Resource
 */
class Paginator implements Pagination
{
    /**
     * @var int
     */
    private $firstPage = 1;

    /**
     * @var int
     */
    private $currentPage = 1;

    /**
     * @var int
     */
    private $pageSize = 0;

    /**
     * @var int
     */
    private $totalResult = 0;

    /**
     * @param int $totalResult
     * @param int $pageSize
     * @param int $currentPage
     */
    public function __construct($totalResult, $pageSize, $currentPage = 1)
    {
        $this->totalResult = (int)$totalResult;
        $this->pageSize    = (int)$pageSize;
        $this->currentPage = (int)$currentPage;

        $this->lastPage = $this->firstPage;
        if ($this->totalResult > 0 && $this->pageSize > 0) {
            $this->lastPage = (int)floor($this->totalResult / $this->pageSize);
        }
    }

    /**
     * @return int
     */
    public function getFirstPage()
    {
        return $this->firstPage;
    }

    /**
     * @return int
     */
    public function getPrevPage()
    {
        $prevPage = $this->currentPage - 1;
        if ($prevPage < $this->firstPage) {
            $prevPage = null;
        }
        return $prevPage;
    }

    /**
     * @return int
     */
    public function getNextPage()
    {
        $nextPage = $this->currentPage + 1;
        if ($nextPage > $this->lastPage) {
            $nextPage = null;
        }
        return $nextPage;
    }

    /**
     * @return int
     */
    public function getLastPage()
    {
        return $this->lastPage;
    }
}
