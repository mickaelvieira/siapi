<?php

namespace SIAPI\Search;

/**
 * Class Search
 * @package SIAPI\ElasticSearch
 */
interface Search
{
    /**
     * @return \SIAPI\Search\Response
     */
    public function getResponse();
} 