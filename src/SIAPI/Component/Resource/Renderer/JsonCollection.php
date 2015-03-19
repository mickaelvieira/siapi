<?php


namespace SIAPI\Component\Resource\Renderer;


use SIAPI\Component\Resource\JsonRenderer;

final class JsonCollection implements JsonRenderer
{
    /**
     * {@inheritdoc}
     */
    public function toJson($object, $pretty = false)
    {
        $options = 0;
        if ($pretty) {
            $options = JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT;
        }
        return json_encode($object, $options);
    }
}
