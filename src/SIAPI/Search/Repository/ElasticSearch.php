<?php

namespace SIAPI\Search\Repository;

use SIAPI\ElasticSearch\Search;
use SIAPI\Search\Response\ElasticSearch as ElasticSearchResponse;

class ElasticSearch
{
    /**
     * @var \SIAPI\ElasticSearch\Search $client
     */
    protected $client;

    /**
     * @param \SIAPI\ElasticSearch\Search $client
     */
    public function __construct(Search $client)
    {
        $this->client = $client;
    }

    public function getAll()
    {
        return new ElasticSearchResponse($this->client->getResults());
    }

} 