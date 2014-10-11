<?php

namespace SIAPI\JsonCollection\Factory\Object;

use SIAPI\JsonCollection\Data;
use SIAPI\JsonCollection\Template as ObjectTemplate;
use SIAPI\JsonCollection\Factory\Template as TemplateInterface;
use SIAPI\Entity\Hydrator;

abstract class Template implements TemplateInterface
{
    /**
     * @return \SIAPI\JsonCollection\Template
     */
    public function getTemplate()
    {
        return $this->buildObjectTemplate();
    }

    /**
     * @return \SIAPI\JsonCollection\Template
     */
    private function buildObjectTemplate()
    {
        $template = new ObjectTemplate();
        $this->addTemplateData($template);

        return $template;
    }

    /**
     * @param \SIAPI\JsonCollection\Template $template
     * @return \SIAPI\JsonCollection\Template
     */
    private function addTemplateData($template)
    {
        foreach ($this->getConfigTemplate() as $data) {
            $template->addData(
                $this->getDataEntity($data)
            );
        }
        return $template;
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
     * @return array
     */
    abstract protected function getConfigTemplate();
}