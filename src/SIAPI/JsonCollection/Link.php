<?php

namespace SIAPI\JsonCollection;

use SIAPI\JsonCollection;
use SIAPI\JsonCollection\Type\Render as RenderType;
/**
 * Class Link
 * @package SIAPI\JsonJsonCollection
 * @link http://amundsen.com/media-types/collection/format/
 * @link http://code.ge/media-types/collection-next-json/
 */
class Link extends JsonConvertible
{
    /**
     * @var string
     * @link http://amundsen.com/media-types/collection/format/#properties-href
     */
    protected $href;

    /**
     * @var string
     * @link http://amundsen.com/media-types/collection/format/#properties-rel
     */
    protected $rel;

    /**
     * @var string
     * @link http://code.ge/media-types/collection-next-json/#property-type
     */
    protected $type;

    /**
     * @var string
     * @link http://amundsen.com/media-types/collection/format/#properties-name
     */
    protected $name;

    /**
     * @var string
     * @link http://amundsen.com/media-types/collection/format/#properties-render
     */
    protected $render = RenderType::LINK;

    /**
     * @var string
     * @link http://amundsen.com/media-types/collection/format/#properties-prompt
     */
    protected $prompt;

    /**
     * @param string $href
     */
    public function setHref($href)
    {
        if (is_string($href)) {
            $this->href = $href;
        }
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
        if (is_string($rel)) {
            $this->rel = $rel;
        }
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
        if (is_string($type)) {
            $this->type = $type;
        }
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
        if (is_string($name)) {
            $this->name = $name;
        }
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
        if (is_string($prompt)) {
            $this->prompt = $prompt;
        }
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
        if (is_string($render)) {
            $this->render = $render;
        }
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
