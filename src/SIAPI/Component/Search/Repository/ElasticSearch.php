<?php

namespace SIAPI\Component\Search\Repository;

use SIAPI\Component\Search\Search as SearchInterface;

use SIAPI\Component\ElasticSearch\Client as SearchClient;
use SIAPI\Component\ElasticSearch\Query\Image as QueryImage;
use SIAPI\Component\ElasticSearch\Search\Image as SearchImage;

use SIAPI\Component\ElasticSearch\Response as ElasticSearchResponse;

class ElasticSearch
{
    /**
     * @var \SIAPI\Component\Search\Search $search
     */
    protected $search;

    public function __construct()
    {
        $client = new SearchClient();
        $query = new QueryImage();

        $this->search = new SearchImage($client, $query);
        $response = $this->search->getResponse();

        var_dump($response->getTotal());
        var_dump($response->getResultSet());
        var_dump($response->getFacets());

    }

    public function getAll()
    {
        //return new ElasticSearchResponse($this->search->getResultSet());
    }
} 