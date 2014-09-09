<?php

namespace SIAPI\Http\Request\Header;

/**
 * Class AcceptCharset
 * @package SIAPI\Http\Request\Header
 */
class AcceptCharset extends AcceptBase
{
    /**
     * @var string
     */
    private $charset;

    /**
     * @param string $charset
     */
    public function setCharset($charset)
    {
        $this->charset = (string)$charset;
    }

    /**
     * @return string
     */
    public function getCharset()
    {
        return $this->charset;
    }
}