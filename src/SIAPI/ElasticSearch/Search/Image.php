<?php

namespace SIAPI\ElasticSearch\Search;

use Elastica\Search as ElasticaSearch;
use SIAPI\Search\Search as SearchInterface;

use SIAPI\ElasticSearch\Type as DocumentType;
use SIAPI\ElasticSearch\Index as IndexName;
use SIAPI\ElasticSearch\Client as ClientBuilder;
use SIAPI\ElasticSearch\Query as QueryInterface;
use SIAPI\ElasticSearch\Response;

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
        $this->search->addTypes(array(
            DocumentType::IMAGE
        ));
        $this->search->addIndices(array(
            IndexName::MAIN
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getResponse()
    {
        $resultSet = $this->search->search($this->query);
        return new Response($resultSet->getResults());
    }
} 