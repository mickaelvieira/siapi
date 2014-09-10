<?php

namespace SIAPI\Http\Request\Header\Accept;

/**
 * Class AcceptBase
 * @package SIAPI\Http\Request\Header
 */
abstract class Entity
{
    /**
     * @var float
     */
    protected $quality = 1;

    /**
     * @return float
     */
    public function getQuality()
    {
        return $this->quality;
    }

    /**
     * @return string
     */
    abstract public function __toString();

    /**
     * @param string $header
     * @return string
     */
    protected function cleanHeaderString($header)
    {
        return preg_replace("/\s/", "", (string)$header);
    }

    /**
     * @param $pieces
     */
    protected function addParams(array $pieces)
    {
        foreach ($pieces as $piece) {

            $param = explode("=", $piece);

            if (count($param) === 2) {
                if ($param[0] === 'q') {
                    $this->quality = (float)$param[1];
                }
            }
        }
    }

    /**
     * @param string $str
     * @return string
     */
    protected function joinQuantity($str)
    {
        if (!empty($str)) {
            $str .= ";" . "q=" . $this->quality;
        }
        return $str;
    }
}
