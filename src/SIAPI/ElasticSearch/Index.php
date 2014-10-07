<?php

namespace SIAPI\ElasticSearch;

/**
 * Class Index
 * @package SIAPI\ElasticSearch
 */
class Index
{
    /**
     * @var string
     */
    private $name;

    /**
     * @return string;
     */
    public function getName()
    {
        return $this->name;
    }
} 