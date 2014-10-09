<?php

namespace SIAPI\ElasticSearch;

interface Filter
{

    /**
     * @param string $value
     * @return \Elastica\Filter\Term
     */
    public function getFilter($value);
} 