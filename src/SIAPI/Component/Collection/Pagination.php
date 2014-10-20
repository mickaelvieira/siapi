<?php

namespace SIAPI\Component\Collection;

class Pagination
{
    /**
     * @var int
     */
    private $firstPage = 1;

    /**
     * @var int
     */
    private $page = 1;

    /**
     * @var int
     */
    private $pageSize = 0;

    /**
     * @var int
     */
    private $totalResult = 0;

    /**
     * @param int $page
     */
    public function setPage($page)
    {
        $this->page = (int)$page;
    }

    /**
     * @param int $totalResult
     */
    public function setTotalResult($totalResult)
    {
        $this->totalResult = (int)$totalResult;
    }

    /**
     * @param int $pageSize
     */
    public function setPageSize($pageSize)
    {
        $this->pageSize = (int)$pageSize;
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
        $prevPage = $this->page - 1;
        if ($prevPage < $this->getFirstPage()) {
            $prevPage = null;
        }
        return $prevPage;
    }

    /**
     * @return int
     */
    public function getNextPage()
    {
        $nextPage = $this->page + 1;
        if ($nextPage > $this->getLastPage()) {
            $nextPage = null;
        }
        return $nextPage;
    }

    /**
     * @return int
     */
    public function getLastPage()
    {
        $lastPage = $this->firstPage;
        if ($this->totalResult > 0 && $this->pageSize > 0) {
            $lastPage = (int)floor($this->totalResult / $this->pageSize);
        }
        return $lastPage ;
    }
} 