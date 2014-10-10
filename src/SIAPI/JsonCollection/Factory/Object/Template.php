<?php

namespace SIAPI\JsonCollection\Factory\Object;

use SIAPI\JsonCollection\Data;
use SIAPI\JsonCollection\Template as ObjectTemplate;
use SIAPI\Entity\Hydrator;

abstract class Template
{
    /**
     * @var \SIAPI\JsonCollection\Template
     */
    protected $template;

    /**
     * @param array $data
     * @return Data
     */
    protected function getDataEntity(array $data)
    {
        return Hydrator::populate(new Data(), $data);
    }

    private function buildObjectTemplate()
    {
        $this->template = new ObjectTemplate();
        $this->addTemplateData();
    }

    /**
     * @return array
     */
    abstract protected function getConfigTemplate();

    /**
     * @return \SIAPI\JsonCollection\Template
     */
    public function getTemplate()
    {
        if (is_null($this->template)) {
            $this->buildObjectTemplate();
        }
        return $this->template;
    }

    /**
     * @return array
     */
    private function prepareTemplateData()
    {
        $data = array();
        foreach ($this->getConfigTemplate() as $config) {
            array_push($data, $this->getDataEntity($config));
        }
        return $data;
    }

    private function addTemplateData()
    {
        $allData = $this->prepareTemplateData();
        foreach ($allData as $data) {
            $this->template->addData($data);
        }
    }
} 