<?php

namespace SIAPI\ElasticSearch\Filter\Term;

use Elastica\Filter\Term;
use SIAPI\ElasticSearch\Filter;

class Mission implements Filter
{
    /**
     * {@inheritdoc}
     */
    public function getFilter($value)
    {
        $filter = new Term();
        $filter->setTerm('pageType', $value);
        return $filter;
    }
} 