<?php

namespace SIAPI\Search\Repository;

use SIAPI\ElasticSearch\Search;
use SIAPI\Search\Response\ElasticSearch as ElasticSearchResponse;

class ElasticSearch
{
    /**
     * @var \SIAPI\ElasticSearch\Search $search
     */
    protected $search;

    /**
     * @param \SIAPI\ElasticSearch\Search $search
     */
    public function __construct(Search $search)
    {
        $this->search = $search;
    }

    public function getAll()
    {
        return new ElasticSearchResponse($this->search->getResults());
    }
} 