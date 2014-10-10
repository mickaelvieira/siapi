<?php

namespace SIAPI\JsonCollection\Factory\Object;

use SIAPI\JsonCollection\Data;
use SIAPI\JsonCollection\Template as JsonCollectionTemplate;
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
        $this->template = new JsonCollectionTemplate();
        $this->addData();
    }

    /**
     * @return array
     */
    abstract protected function getConfigTemplate();

    /**
     * @return Template
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
    private function prepareData()
    {
        $data = array();
        foreach ($this->getConfigTemplate() as $config) {
            array_push($data, $this->getDataEntity($config));
        }
        return $data;
    }

    private function addData()
    {
        $allData = $this->prepareData();
        foreach ($allData as $data) {
            $this->template->addData($data);
        }
    }
} 