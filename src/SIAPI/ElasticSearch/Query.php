<?php

namespace SIAPI\ElasticSearch;

interface Query
{
    /**
     * @return \Elastica\Query
     */
    public function getQuery();
} 