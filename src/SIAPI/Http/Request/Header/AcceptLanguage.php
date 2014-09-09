<?php

namespace SIAPI\Http\Request\Header;

/**
 * Class AcceptLanguage
 * @package SIAPI\Http\Request\Header
 */
class AcceptLanguage extends AcceptBase
{
    /**
     * @var \SIAPI\Http\Request\Header\ValueRange
     */
    private $language;

    /**
     * @param \SIAPI\Http\Request\Header\ValueRange $language
     */
    public function setLanguage(ValueRange $language)
    {
        $this->language = $language;
    }

    /**
     * @return \SIAPI\Http\Request\Header\ValueRange
     */
    public function getLanguage()
    {
        return $this->language;
    }
}
