<?php

namespace SIAPI\Component\Search;

/**
 * Class Search
 * @package SIAPI\Component\ElasticSearch
 */
interface Search
{
    /**
     * @return \SIAPI\Component\Search\ResultSet
     */
    public function getResultSet();
}
