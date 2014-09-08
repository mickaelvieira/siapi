<?php

namespace SIAPI\Entity\Http\Request\Header;

/**
 * Class AcceptLanguage
 * @package SIAPI\Entity\Http\Request\Header
 */
class AcceptLanguage extends AcceptBase
{
    /**
     * @var string
     */
    private $language;

    /**
     * @param string $language
     */
    public function setLanguage($language)
    {
        $this->language = (string)$language;
    }

    /**
     * @return string
     */
    public function getLanguage()
    {
        return $this->language;
    }
}
