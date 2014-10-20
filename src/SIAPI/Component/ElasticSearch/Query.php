<?php

namespace SIAPI\Component\ElasticSearch;

interface Query
{
    /**
     * @return \Elastica\Query
     */
    public function getQuery();
} 