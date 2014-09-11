<?php

namespace SIAPI\Negotiation\Header\Accept;

/**
 * Class Entity
 * @package SIAPI\Negotiation\Header\Accept
 */
abstract class Entity
{
    /**
     * @var float
     */
    protected $quality = 1.0;

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
     * @return bool
     */
    abstract public function hasAcceptAll();

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

    protected function forceQualityWhenHasAcceptAll()
    {
        if ($this->hasAcceptAll()) {
            $this->quality = 1.0;
        }
    }

    /**
     * @param string $str
     * @return string
     */
    protected function joinQuantity($str)
    {
        if (!empty($str) && !$this->hasAcceptAll()) {
            $str .= ";" . "q=" . $this->quality;
        }
        return $str;
    }
}
