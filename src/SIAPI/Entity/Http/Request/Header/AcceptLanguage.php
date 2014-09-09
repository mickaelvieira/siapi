<?php

namespace SIAPI\Entity\Http\Request\Header;

/**
 * Class AcceptLanguage
 * @package SIAPI\Entity\Http\Request\Header
 */
class AcceptLanguage extends AcceptBase
{
    /**
     * @var \SIAPI\Entity\Http\Request\Header\ValueRange
     */
    private $language;

    /**
     * @param \SIAPI\Entity\Http\Request\Header\ValueRange $language
     */
    public function setLanguage(ValueRange $language)
    {
        $this->language = $language;
    }

    /**
     * @return \SIAPI\Entity\Http\Request\Header\ValueRange
     */
    public function getLanguage()
    {
        return $this->language;
    }
}
