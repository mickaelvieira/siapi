<?php

namespace SIAPI\ElasticSearch;

interface Aggregation
{
    /**
     * @return \Elastica\Aggregation\AbstractAggregation
     */
    public function getAggregation();
} 