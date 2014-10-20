<?php

namespace SIAPI\Component\Search;

/**
 * Class Search
 * @package SIAPI\Component\ElasticSearch
 */
interface Search
{
    /**
     * @return \SIAPI\Component\Search\Response
     */
    public function getResponse();
} 