<?php

namespace SIAPI\JsonCollection\Factory\Query;

use SIAPI\JsonCollection\Data;
use SIAPI\JsonCollection\Query;
use SIAPI\Entity\Hydrator;

abstract class Template
{
    /**
     * @var \SIAPI\JsonCollection\Query
     */
    protected $query;

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

        $this->addQueryParameters();
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
     * @return array
     */
    abstract protected function getConfigParameters();

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

    /**
     * @return array
     */
    private function prepareQueryParameters()
    {
        $parameters = array();
        foreach ($this->getConfigParameters() as $parameter) {
            array_push($parameters, $this->getDataEntity($parameter));
        }
        return $parameters;
    }

    private function addQueryParameters()
    {
        $parameters = $this->prepareQueryParameters();
        foreach ($parameters as $parameter) {
            $this->query->addData($parameter);
        }
    }
} 