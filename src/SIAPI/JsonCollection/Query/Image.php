<?php

namespace SIAPI\JsonCollection\Query;

use SIAPI\JsonCollection\Data;
use SIAPI\JsonCollection\Query;
use SIAPI\Entity\Hydrator;

class Image extends Query
{
    /**
     * {@inheritdoc}
     */
    protected $href = 'search';

    /**
     * {@inheritdoc}
     */
    protected $rel = 'search';

    /**
     * {@inheritdoc}
     */
    protected $name = 'image';

    /**
     * {@inheritdoc}
     */
    protected $prompt = 'Here my prompt Message';


    public function __construct()
    {
        $this->addQueryParameters();
    }

    private function addQueryParameters()
    {
        foreach ($this->getConfigParameters() as $parameter) {
            $this->addData(
                $this->getDataEntity($parameter)
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
     * @return array
     */
    private function getConfigParameters()
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