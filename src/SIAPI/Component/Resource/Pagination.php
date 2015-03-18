<?php

namespace SIAPI\Component\Resource;

/**
 * Interface Pagination
 * @package SIAPI\Component\Resource
 */
interface Pagination
{
    /**
     * @return int
     */
    public function getFirstPage();

    /**
     * @return int
     */
    public function getPrevPage();

    /**
     * @return int
     */
    public function getNextPage();

    /**
     * @return int
     */
    public function getLastPage();

    /**
     * @return int
     */
    public function getCurrentPage();
}
