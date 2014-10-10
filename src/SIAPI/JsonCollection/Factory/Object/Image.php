<?php
/**
 * Created by PhpStorm.
 * User: mickael
 * Date: 10/10/14
 * Time: 12:36
 */

namespace SIAPI\JsonCollection\Factory\Template\Object;


class Image extends Base
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
            )
        );
    }
} 