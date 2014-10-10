<?php

namespace SIAPI\ElasticSearch;

use SIAPI\ElasticSearch\Client as ClientBuilder;
use SIAPI\ElasticSearch\Query as QueryInterface;

/**
 * Class Search
 * @package SIAPI\ElasticSearch
 */
interface Search
{
    /**
     * @param \SIAPI\ElasticSearch\Client $client
     * @param \SIAPI\ElasticSearch\Query $query
     */
    public function __construct(ClientBuilder $client, QueryInterface $query);

    /**
     * @return array
     */
    public function getResults();
} 