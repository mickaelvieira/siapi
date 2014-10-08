<?php

namespace SIAPI\JsonCollection\Factory\Template\Query;

use SIAPI\JsonCollection\Data;
use SIAPI\JsonCollection\Query;
use SIAPI\Entity\Hydrator;

abstract class Base
{
    /**
     * @var \SIAPI\JsonCollection\Query
     */
    protected $query;

    /**
     * @var array
     */
    protected $data = array();

    /**
     * @param $queryData
     */
    protected function populateData(array $queryData)
    {
        foreach ($queryData as $data) {
            array_push($this->data, $this->getDataEntity($data));
        }
    }

    /**
     * @param array $data
     * @return Data
     */
    protected function getDataEntity(array $data)
    {
        return Hydrator::populate(new Data(), $data);
    }

    private function buildQuery()
    {
        $this->query = new Query();

        $this->query->setHref('search');
        $this->query->setRel($this->getHref());
        $this->query->setName($this->getName());
        $this->query->setPrompt($this->getPrompt());

        foreach ($this->data as $data) {
            $this->query->addData($data);
        }
    }

    /**
     * @return string
     */
    abstract protected function getName();

    /**
     * @return string
     */
    abstract protected function getPrompt();

    /**
     * @return string
     */
    abstract protected function getHref();

    /**
     * @return Query
     */
    public function getQuery()
    {
        if (is_null($this->query)) {
            $this->buildQuery();
        }
        return $this->query;
    }
} 