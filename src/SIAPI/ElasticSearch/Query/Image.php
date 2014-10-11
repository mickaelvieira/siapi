<?php

namespace SIAPI\ElasticSearch\Query;

use JsonSerializable;
use Elastica\Query as ElasticaQuery;
use Elastica\Aggregation\Terms as AggrTerms;
use SIAPI\ElasticSearch\Query as QueryInterface;

class Image implements QueryInterface, JsonSerializable
{
    /**
     * @var \Elastica\Query
     */
    private $query;

    /**
     * @var array
     */
    private $aggregations = [
        'mission' => 'mission'
    ];

    public function __construct()
    {
        $this->buildQuery();
    }

    /**
     * @return \Elastica\Query
     */
    public function getQuery()
    {
        return $this->query;
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return $this->query->toArray();
    }

    /**
     *
     */
    private function buildQuery()
    {
        $this->query = new ElasticaQuery(new ElasticaQuery\MatchAll());
        $this->addAggregations();
    }

    /**
     *
     */
    private function addAggregations()
    {
        foreach ($this->aggregations as $name => $field) {

            $aggs = new AggrTerms($name);
            $aggs->setField($field);
            $aggs->setSize(0);

            $this->query->addAggregation($aggs);
        }
    }
}
