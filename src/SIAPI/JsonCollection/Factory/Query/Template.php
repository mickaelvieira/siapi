<?php

namespace SIAPI\JsonCollection\Factory\Query;

use SIAPI\JsonCollection\Data;
use SIAPI\JsonCollection\Query as QueryTemplate;
use SIAPI\JsonCollection\Factory\Template as TemplateInterface;
use SIAPI\Entity\Hydrator;

abstract class Template implements TemplateInterface
{
    /**
     * @var \SIAPI\JsonCollection\Query
     */
    protected $template;

    /**
     * @return \SIAPI\JsonCollection\Query
     */
    public function getTemplate()
    {
        if (is_null($this->template)) {
            $this->buildQuery();
        }
        return $this->template;
    }

    private function buildQuery()
    {
        $this->template = new QueryTemplate();

        $this->template->setHref('search');
        $this->template->setRel($this->getHref());
        $this->template->setName($this->getName());
        $this->template->setPrompt($this->getPrompt());

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
            $this->template->addData($parameter);
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
} 