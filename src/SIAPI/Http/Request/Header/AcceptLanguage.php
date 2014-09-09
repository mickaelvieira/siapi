<?php

namespace SIAPI\Http\Request\Header;

/**
 * Class AcceptLanguage
 * @package SIAPI\Http\Request\Header
 */
class AcceptLanguage extends AcceptBase
{

    // Accept-Language = "Accept-Language" ":"
    //                   1#( language-range [ ";" "q" "=" qvalue ] )
    //                   language-range  = ( ( 1*8ALPHA *( "-" 1*8ALPHA ) ) | "*" )

    /**
     * @var \SIAPI\Http\Request\Header\ValueRange
     */
    private $languageRange;

    /**
     * @param string $pieces
     */
    public function __construct($pieces)
    {
        // en-gb;q=0.8

        $pieces   = explode(";", (string)$pieces);
        $language = array_shift($pieces);

        if ($language) {
            $this->languageRange = new ValueRange($language, "-");
            $this->addParams($pieces);
        }
    }

    /**
     * @return \SIAPI\Http\Request\Header\ValueRange
     */
    public function getLanguageRange()
    {
        return $this->languageRange;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->languageRange . ";q=" . $this->quality;
    }
}
