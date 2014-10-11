<?php

namespace SIAPI\JsonCollection\Factory\Query;

use SIAPI\JsonCollection\Data;
use SIAPI\JsonCollection\Query as QueryTemplate;
use SIAPI\JsonCollection\Factory\Template as TemplateInterface;
use SIAPI\Entity\Hydrator;

abstract class Template implements TemplateInterface
{
    /**
     * @return \SIAPI\JsonCollection\Query
     */
    public function getTemplate()
    {
        return $this->buildQueryTemplate();
    }

    /**
     * @return \SIAPI\JsonCollection\Query
     */
    private function buildQueryTemplate()
    {
        $template = new QueryTemplate();

        $template->setHref('search');
        $template->setRel($this->getHref());
        $template->setName($this->getName());
        $template->setPrompt($this->getPrompt());

        $this->addQueryParameters($template);

        return $template;
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
     * @param \SIAPI\JsonCollection\Query $template
     * @return \SIAPI\JsonCollection\Query
     */
    private function addQueryParameters($template)
    {
        foreach ($this->getConfigParameters() as $parameter) {
            $template->addData(
                $this->getDataEntity($parameter)
            );
        }
        return $template;
    }

    /**
     * @param array $data
     * @return \SIAPI\JsonCollection\Data
     */
    protected function getDataEntity(array $data)
    {
        return Hydrator::populate(new Data(), $data);
    }
}