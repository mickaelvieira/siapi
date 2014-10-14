<?php

namespace SIAPI\ElasticSearch;

use SIAPI\Entity\Hydrator;
use SIAPI\Search\Result\Image;
use SIAPI\Search\ResultSet;
use SIAPI\Search\Response as ResponseInterface;
use Elastica\ResultSet as ElasticaResultSet;

class Response implements ResponseInterface
{
    /**
     * @var \SIAPI\Search\ResultSet
     */
    private $resultSet;

    /**
     * @var int
     */
    private $total = 0;

    /**
     * @param ElasticaResultSet $resultSet
     */
    public function __construct(ElasticaResultSet $resultSet)
    {
        $results         = $resultSet->getResults();
        $this->total     = $resultSet->getTotalHits();
        $this->resultSet = new ResultSet();//$this->extractResultSetFromData($data);

        foreach ($resultSet->getResults() as $result) {

            $image = new Image();
            $image->setId($result->getId());

            $this->resultSet->add(
                Hydrator::populate($image, $result->getSource())
            );
        }
    }

    /**
     * {@inheritdoc}
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * {@inheritdoc}
     */
    public function getResultSet()
    {
        return $this->resultSet;
    }

    /**
     * @param array $data
     * @return \SIAPI\Search\ResultSet
     */
    private function extractResultSetFromData(array $data)
    {
        $resultSet = new ResultSet();
        foreach ($data['hits']['hits'] as $hit) {
            $result = new Image();
            $resultSet->add(Hydrator::populate($result, $hit['_source']));
        }
        return $resultSet;
    }

    /**
     * @param array $data
     */
    private function extractTotalFromData(array $data)
    {
        return $data['hits']['total'];
    }
} 