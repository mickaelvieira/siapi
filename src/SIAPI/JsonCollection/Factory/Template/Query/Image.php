<?php

namespace SIAPI\JsonCollection\Factory\Template\Query;


class Image extends Base
{
    public function __construct()
    {
        $this->populateData(
            array(
                array(
                    'name' => 'mission',
                    'value' => ''
                ),
                array(
                    'name' => 'target',
                    'value' => ''
                )
            )
        );
    }

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
}