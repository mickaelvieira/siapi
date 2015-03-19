<?php

namespace SIAPI\Component\Resource;

/**
 * Interface JsonRenderer
 * @package SIAPI\Component\Resource
 */
interface JsonRenderer
{

    /**
     * @param mixed $object
     * @param bool  $pretty
     * @return mixed
     */
    public function toJson($object, $pretty = false);
}
