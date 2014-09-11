<?php

namespace SIAPI\Negotiation\Header\Accept\Entity;

use SIAPI\Negotiation\Header\Accept\Entity;
use SIAPI\Negotiation\Header\Accept\ValueRange;

/**
 * Class Charset
 * @package SIAPI\Negotiation\Header\Accept\Entity
 */
class Charset extends Entity
{
    // Accept-Charset = "Accept-Charset" ":"
    //                  1#( ( charset | "*" )[ ";" "q" "=" qvalue ] )

    /**
     * @var \SIAPI\Negotiation\Header\Accept\ValueRange
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
            $this->charset = new ValueRange($charset);
            $this->addParams($pieces);
            $this->forceQualityWhenHasAcceptAll();
        }
    }

    /**
     * @return bool
     */
    public function hasAcceptAll()
    {
        return ($this->charset->getValue() === '*');
    }

    /**
     * @return string
     */
    public function getCharset()
    {
        return $this->charset->getValue();
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
