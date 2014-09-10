<?php

namespace SIAPI\Http\Request\Header\Accept\Entity;

use SIAPI\Http\Request\Header\Accept\Entity;
use SIAPI\Http\Request\Header\Accept\ValueRange;

/**
 * Class AcceptLanguage
 * @package SIAPI\Http\Request\Header\Accept\Entity
 */
class AcceptLanguage extends Entity
{

    // Accept-Language = "Accept-Language" ":"
    //                   1#( language-range [ ";" "q" "=" qvalue ] )
    //                   language-range  = ( ( 1*8ALPHA *( "-" 1*8ALPHA ) ) | "*" )

    /**
     * @var \SIAPI\Http\Request\Header\Accept\ValueRange
     */
    private $languageRange;

    /**
     * @param string $pieces
     */
    public function __construct($pieces)
    {
        $pieces   = explode(";", $this->cleanHeaderString($pieces));
        $language = array_shift($pieces);

        if ($language) {
            $this->languageRange = new ValueRange($language, "-");
            $this->addParams($pieces);
        }
    }

    /**
     * @return \SIAPI\Http\Request\Header\Accept\ValueRange
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
        $str = (string)$this->languageRange;
        return $this->joinQuantity($str);
    }
}
