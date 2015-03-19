<?php

namespace SIAPI\Component\ElasticSearch\Query;

use JsonSerializable;
use Elastica\Query as ElasticaQuery;
use Elastica\Aggregation\Terms as AggrTerms;
use Elastica\Filter\Terms as FilterTerms;
use SIAPI\Component\ElasticSearch\Query as QueryInterface;

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
        'target'     => 'target_raw',
        'mission'    => 'mission_raw',
        'spacecraft' => 'spacecraft_raw',
        'instrument' => 'instrument_raw',
        'source'     => 'source_raw'
    ];

    private $terms = array(
        'target'     => '',
        'mission'    => '',
        'spacecraft' => '',
        'instrument' => '',
        'source'     => ''
    );

    public function __construct($terms = array())
    {
        $this->terms = array_merge($this->terms, $terms);
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
        $match = new ElasticaQuery\Match();
        $match->setField('mission', array('Magellan', 'Aquarius'));

        $this->query = new ElasticaQuery(new ElasticaQuery\MatchAll());
        $this->query->setFrom(110);
        $this->query->setSize(12);
        //$this->addTerms();
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

    private function addTerms()
    {
        foreach ($this->terms as $name => $value) {

            if ($value) {
                $term = new FilterTerms($name, array($value));
                $this->query->setPostFilter($term);
            }
        }
    }
}
