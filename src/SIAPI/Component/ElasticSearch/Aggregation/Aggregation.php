<?php

namespace SIAPI\Component\ElasticSearch\Aggregation;

use Elastica\Aggregation\Terms;

class Aggregation
{
    /**
     * @return \Elastica\Aggregation\Terms
     */
    public static function getMission()
    {
        $aggregation = new Terms('mission');
        $aggregation->setField('mission');
        $aggregation->setSize(0);

        return $aggregation;
    }
}
