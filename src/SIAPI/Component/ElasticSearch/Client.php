<?php

namespace SIAPI\Component\ElasticSearch;

use Elastica\Client as ElasticaClient;

class Client
{
    /**
     * @var \Elastica\Client
     */
    private $client;

    /**
     * @param array $config
     */
    public function __construct(array $config = [])
    {
        $this->client = new ElasticaClient($config);
    }

    /**
     * @return ElasticaClient
     */
    public function getClient()
    {
        return $this->client;
    }
}
