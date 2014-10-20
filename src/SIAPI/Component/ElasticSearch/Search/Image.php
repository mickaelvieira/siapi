<?php

namespace SIAPI\Component\ElasticSearch\Search;

use Elastica\Search as ElasticaSearch;
use SIAPI\Component\Search\Search as SearchInterface;

use SIAPI\Component\ElasticSearch\Type as DocumentType;
use SIAPI\Component\ElasticSearch\Index as IndexName;
use SIAPI\Component\ElasticSearch\Client as ClientBuilder;
use SIAPI\Component\ElasticSearch\Query as QueryInterface;
use SIAPI\Component\ElasticSearch\Response;

class Image implements SearchInterface
{
    /**
     * @var \SIAPI\Component\ElasticSearch\Query
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