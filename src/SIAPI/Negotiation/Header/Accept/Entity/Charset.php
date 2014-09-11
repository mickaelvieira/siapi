<?php

namespace SIAPI\Negotiation\Header\Accept\Entity;

use SIAPI\Negotiation\Header\Accept\Entity;

/**
 * Class Charset
 * @package SIAPI\Negotiation\Header\Accept\Entity
 */
class Charset extends Entity
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
     * @return bool
     */
    public function isAll()
    {
        return ($this->charset === '*');
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
