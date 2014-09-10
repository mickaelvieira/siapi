<?php

namespace SIAPI\Collection\JSON;

use SIAPI\Collection\JsonConvertible;

/**
 * Class Link
 * @package SIAPI\Collection\JSON
 * @link http://amundsen.com/media-types/collection/format/
 * @link http://code.ge/media-types/collection-next-json/
 */
class Link extends JsonConvertible
{
    /**
     * @var string
     * @link http://amundsen.com/media-types/collection/format/#properties-href
     */
    private $href;

    /**
     * @var string
     * @link http://amundsen.com/media-types/collection/format/#properties-rel
     */
    private $rel;

    /**
     * @var string
     * @link http://code.ge/media-types/collection-next-json/#property-type
     */
    private $type;

    /**
     * @var string
     * @link http://amundsen.com/media-types/collection/format/#properties-name
     */
    private $name;

    /**
     * @var string
     * @link http://amundsen.com/media-types/collection/format/#properties-render
     */
    private $render;

    /**
     * @var string
     * @link http://amundsen.com/media-types/collection/format/#properties-prompt
     */
    private $prompt;

    /**
     * @param string $href
     */
    public function setHref($href)
    {
        $this->href = (string)$href;
    }

    /**
     * @return string
     */
    public function getHref()
    {
        return $this->href;
    }

    /**
     * @param string $rel
     */
    public function setRel($rel)
    {
        $this->rel = (string)$rel;
    }

    /**
     * @return string
     */
    public function getRel()
    {
        return $this->rel;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = (string)$type;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = (string)$name;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $prompt
     */
    public function setPrompt($prompt)
    {
        $this->prompt = (string)$prompt;
    }

    /**
     * @return string
     */
    public function getPrompt()
    {
        return $this->prompt;
    }

    /**
     * @param string $render
     */
    public function setRender($render)
    {
        $this->render = (string)$render;
    }

    /**
     * @return string
     */
    public function getRender()
    {
        return $this->render;
    }

    /**
     * {@inheritdoc}
     */
    protected function getObjectData()
    {
        return get_object_vars($this);
    }
}
