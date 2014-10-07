<?php

namespace SIAPI\JsonCollection\Template\Query;


class Image extends Base
{
    public function __construct()
    {
        $this->populateData(
            array(
                'mission' => '',
                'target'  => ''
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