<?php

namespace SIAPI\Http\Request\Header;

/**
 * Class AcceptCharset
 * @package SIAPI\Http\Request\Header
 */
class AcceptCharset extends AcceptBase
{
    // Accept-Charset = "Accept-Charset" ":"
    //                  1#( ( charset | "*" )[ ";" "q" "=" qvalue ] )

    /**
     * @var string
     */
    private $charset;

    /**
     * @param string $pieces
     */
    public function __construct($pieces)
    {
        // en-gb;q=0.8

        $pieces  = explode(";", (string)$pieces);
        $charset = array_shift($pieces);

        if ($charset) {
            $this->charset = $charset;
            $this->addParams($pieces);
        }
    }

    /**
     * @return string
     */
    public function getCharset()
    {
        return $this->charset;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->charset . ";q=" . $this->quality;
    }
}
