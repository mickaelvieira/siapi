<?php

namespace SIAPI\JsonCollection\Factory\Object;

class Image extends Template
{
    /**
     * {@inheritdoc
     */
    protected function getConfigTemplate()
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