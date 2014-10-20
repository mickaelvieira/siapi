<?php

namespace SIAPI\Component\ElasticSearch;

interface Filter
{
    /**
     * @return \Elastica\Filter\AbstractFilter
     */
    public function getFilter();
} 