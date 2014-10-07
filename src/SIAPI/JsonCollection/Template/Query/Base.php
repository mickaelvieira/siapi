<?php

namespace SIAPI\JsonCollection\Template\Query;

use SIAPI\JsonCollection\Query;

abstract class Base
{
    /**
     * @var \SIAPI\JsonCollection\Query
     */
    protected $query;

    public function __construct()
    {
        $this->query = new Query();
        $this->query->setHref('search');
        $this->query->setName('base');
        $this->query->setPrompt('Basic search implementation');
        $this->query->setRel('search');
        //$this->query->addData()
    }

    abstract protected function addData();

    /**
     * @return Query
     */
    public function getQuery()
    {
        return $this->query;
    }
} 