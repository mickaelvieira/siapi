<?php

namespace SIAPI\Search\Response;

use SIAPI\Entity\Hydrator;
use SIAPI\Search\Result\Document;
use SIAPI\Search\ResultSet;
use SIAPI\Search\Response as ResponseInterface;

class ElasticSearch implements ResponseInterface
{
    /**
     * @var \SIAPI\Search\ResultSet
     */
    private $set;

    /**
     * @var int
     */
    private $total = 0;

    /**
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->total = $data['hits']['total'];

        $this->set = new ResultSet();
        foreach ($data['hits']['hits'] as $hit) {
            $result = new Document();
            $this->set->add(Hydrator::populate($result, $hit['_source']));
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
        return $this->set;
    }
} 