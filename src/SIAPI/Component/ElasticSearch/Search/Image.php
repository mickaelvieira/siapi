<?php

namespace SIAPI\Component\ElasticSearch\Search;

use Elastica\Search as ElasticaSearch;
use SIAPI\Component\Search\ResultSet;
use SIAPI\Component\Search\Result\Image as ResultImage;
use SIAPI\Component\Search\Search as SearchInterface;

use SIAPI\Component\ElasticSearch\Type as DocumentType;
use SIAPI\Component\ElasticSearch\Index as IndexName;
use SIAPI\Component\ElasticSearch\Client as ClientBuilder;
use SIAPI\Component\ElasticSearch\Query as QueryInterface;

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

        $this->search->addTypes([
            DocumentType::IMAGE
        ]);
        $this->search->addIndices([
            IndexName::MAIN
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function getResultSet()
    {
        $results = $this->search->search($this->query->getQuery());

        $resultSet = new ResultSet($results->getTotalHits());

        foreach ($results->getResults() as $result) {

            $source = $result->getSource();
            $image  = new ResultImage($result->getId());

            $image = $image->withInstrument($source['instrument'])
                ->withMission($source['mission'])
                ->withSpacecraft($source['spacecraft'])
                ->withTarget($source['target']);

            $resultSet->add($image);
        }

        return $resultSet;
    }
}
