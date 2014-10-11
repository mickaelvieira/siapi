<?php

namespace SIAPI\ElasticSearch;

use Elastica\Client as ElasticaClient;

class Client
{
    /**
     * @var \Elastica\Client
     */
    private $client;

    /**
     * @var array
     */
    private $config = [
        'host' => '127.0.0.1',
        'port' => 9200
    ];

    public function __construct()
    {
        $this->client = new ElasticaClient($this->config);
    }

    /**
     * @return ElasticaClient
     */
    public function getClient()
    {
        return $this->client;
    }
} 