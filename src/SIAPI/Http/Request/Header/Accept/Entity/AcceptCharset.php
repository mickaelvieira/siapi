<?php

namespace SIAPI\Http\Request\Header\Accept\Entity;

use SIAPI\Http\Request\Header\Accept\Entity;

/**
 * Class AcceptCharset
 * @package SIAPI\Http\Request\Header
 */
class AcceptCharset extends Entity
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
        $pieces  = explode(";", $this->cleanHeaderString($pieces));
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
        $str = (string)$this->charset;
        return $this->joinQuantity($str);
    }
}
