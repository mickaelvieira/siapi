<?php

namespace SIAPI\ElasticSearch\Search;

use Elastica\Search as ElasticaSearch;

use SIAPI\ElasticSearch\Client as ClientBuilder;
use SIAPI\ElasticSearch\Search as SearchInterface;
use SIAPI\ElasticSearch\Query as QueryInterface;

class Image implements SearchInterface
{
    /**
     * @var \SIAPI\ElasticSearch\Query
     */
    private $query;

    /**
     * @var \Elastica\Search
     */
    private $search;

    /**
     * {@inheritdoc}
     */
    public function __construct(ClientBuilder $client, QueryInterface $query)
    {
        $this->query  = $query;
        $this->search = new ElasticaSearch($client->getClient());
    }

    /**
     * {@inheritdoc}
     */
    public function getResults()
    {
        return $this->search->search($this->query);
    }
} 