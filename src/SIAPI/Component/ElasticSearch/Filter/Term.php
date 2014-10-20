<?php

namespace SIAPI\Component\ElasticSearch\Filter;

use Elastica\Filter\Term as TermFilter;
use SIAPI\Component\ElasticSearch\Filter as FilterInterface;

class Term implements FilterInterface
{
    /**
     * @var string
     */
    private $key;

    /**
     * @var string
     */
    private $value;

    /**
     * @param $key
     * @param $value
     */
    public function __construct($key, $value)
    {
        $this->key = $key;
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * @param string $key
     */
    public function setKey($key)
    {
        $this->key = $key;
    }

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param string $value
     */
    public function setValue($value)
    {
        $this->key = $value;
    }

    /**
     * {@inheritdoc}
     */
    public function getFilter()
    {
        $filter = new TermFilter();
        $filter->setTerm($this->key, $this->key);
        return $filter;
    }
} 