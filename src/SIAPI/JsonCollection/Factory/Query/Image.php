<?php

namespace SIAPI\JsonCollection\Factory\Query;

class Image extends Template
{
    /**
     * {@inheritdoc}
     */
    protected function getName()
    {
        return 'image';
    }

    /**
     * {@inheritdoc}
     */
    protected function getPrompt()
    {
        return 'Here my prompt Message';
    }

    /**
     * {@inheritdoc}
     */
    protected function getHref()
    {
        return 'search';
    }

    /**
     * {@inheritdoc
     */
    protected function getConfigParameters()
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
            )
        );
    }
}