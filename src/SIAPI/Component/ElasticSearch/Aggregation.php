<?php

namespace SIAPI\Component\ElasticSearch;

interface Aggregation
{
    /**
     * @return \Elastica\Aggregation\AbstractAggregation
     */
    public function getAggregation();
} 