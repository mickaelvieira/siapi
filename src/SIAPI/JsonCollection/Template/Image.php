<?php

namespace SIAPI\JsonCollection\Template;

use SIAPI\JsonCollection\Data;
use SIAPI\JsonCollection\Template;
use SIAPI\Entity\Hydrator;

class Image extends Template
{
    public function __construct()
    {
        $this->addTemplateData();
    }


    private function addTemplateData()
    {
        foreach ($this->getConfigTemplate() as $data) {
            $this->addData(
                $this->getDataEntity($data)
            );
        }
    }

    /**
     * @param array $data
     * @return \SIAPI\JsonCollection\Data
     */
    private function getDataEntity(array $data)
    {
        return Hydrator::populate(new Data(), $data);
    }

    /**
     * {@inheritdoc
     */
    private function getConfigTemplate()
    {
        return array(
            array(
                'name' => 'mission',
                'value' => ''
            ),
            array(
                'name' => 'target',
                'value' => ''
            ),
            array(
                'name' => 'satelliteof',
                'value' => ''
            ),
            array(
                'name' => 'spacecraft',
                'value' => ''
            ),
            array(
                'name' => 'instrument',
                'value' => ''
            ),
            array(
                'name' => 'extra',
                'value' => ''
            ),
            array(
                'name' => 'source',
                'value' => ''
            )
        );
    }
} 