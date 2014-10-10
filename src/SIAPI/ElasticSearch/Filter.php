<?php

namespace SIAPI\ElasticSearch;

interface Filter
{
    /**
     * @return \Elastica\Filter\AbstractFilter
     */
    public function getFilter();
} 