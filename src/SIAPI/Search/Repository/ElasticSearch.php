<?php

namespace SIAPI\Search\Repository;

use SIAPI\Search\Search as SearchInterface;
use SIAPI\ElasticSearch\Response as ElasticSearchResponse;

class ElasticSearch
{
    /**
     * @var \SIAPI\Search\Search $search
     */
    protected $search;

    /**
     * @param \SIAPI\Search\Search $search
     */
    public function __construct(SearchInterface $search)
    {
        $this->search = $search;
    }

    public function getAll()
    {
        return new ElasticSearchResponse($this->search->getResults());
    }
} 