<?php


namespace SIAPI\Component\Resource\Renderer;


use SIAPI\Component\Resource\JsonRenderer;

final class Hal implements JsonRenderer
{
    /**
     * {@inheritdoc}
     */
    public function toJson($object, $pretty = false)
    {
        return $object->asJson($pretty);
    }
}
