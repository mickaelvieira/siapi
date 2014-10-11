<?php

namespace SIAPI\ElasticSearch;

use SIAPI\Entity\Hydrator;
use SIAPI\Search\Result\Image;
use SIAPI\Search\ResultSet;
use SIAPI\Search\Response as ResponseInterface;

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
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->total     = $this->extractTotalFromData($data);
        $this->resultSet = $this->extractResultSetFromData($data);
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