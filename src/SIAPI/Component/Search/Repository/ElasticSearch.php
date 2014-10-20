<?php

namespace SIAPI\Component\Search\Repository;

use SIAPI\Component\Search\Search as SearchInterface;
use SIAPI\Component\ElasticSearch\Response as ElasticSearchResponse;

class ElasticSearch
{
    /**
     * @var \SIAPI\Component\Search\Search $search
     */
    protected $search;

    /**
     * @param \SIAPI\Component\Search\Search $search
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