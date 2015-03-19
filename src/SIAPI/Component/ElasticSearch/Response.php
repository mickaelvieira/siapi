<?php

namespace SIAPI\Component\ElasticSearch;

use SIAPI\Component\Search\Result\Image;
use SIAPI\Component\Search\ResultSet;
use SIAPI\Component\Search\Response as ResponseInterface;
use Elastica\ResultSet as ElasticaResultSet;

class Response implements ResponseInterface
{
    /**
     * @var \SIAPI\Component\Search\ResultSet
     */
    private $resultSet;

    /**
     * @var int
     */
    private $total = 0;

    /**
     * @var array
     */
    private $facets = [];

    /**
     * @param ElasticaResultSet $resultSet
     */
    public function __construct(ElasticaResultSet $resultSet)
    {
        $this->total     = $resultSet->getTotalHits();
        $this->resultSet = new ResultSet($resultSet->getTotalHits());

        foreach ($resultSet->getResults() as $result) {

            $image = new Image($result->getId());

            $image->withInstrument($result->getInstrument())
                    ->withMission($result->getMission())
                    ->withSpacecraft($result->getSpacecraft())
                    ->withTarget($result->getTarget());

            $this->resultSet->add($image);
        }

        foreach ($resultSet->getAggregations() as $name => $aggregation) {
            $this->facets[$name] = array();
            foreach ($aggregation['buckets'] as $value) {
                array_push(
                    $this->facets[$name],
                    array(
                        'value' => $value['key'],
                        'prompt' => $value['key'] . " (" . $value['doc_count'] . ")"
                    )
                );
            }
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
     * {@inheritdoc}
     */
    public function getFacets()
    {
        return $this->facets;
    }

} 