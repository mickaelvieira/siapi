<?php

namespace SIAPI\Http\Request\Header\Accept\Entity;

use SIAPI\Http\Request\Header\Accept\Entity;
use SIAPI\Http\Request\Header\Accept\ValueRange;

/**
 * Class AcceptMedia
 * @package SIAPI\Http\Request\Header\Accept\Entity
 */
class AcceptMedia extends Entity
{
    // Accept         = "Accept" ":"
    //                  #( media-range [ accept-params ] )
    //
    // media-range    = ( "*/*"
    //                  | ( type "/" "*" )
    //                  | ( type "/" subtype )
    //                  ) *( ";" parameter )
    // accept-params  = ";" "q" "=" qvalue *( accept-extension )
    // accept-extension = ";" token [ "=" ( token | quoted-string ) ]

    /**
     * @var \SIAPI\Http\Request\Header\Accept\ValueRange
     */
    private $mediaRange;

    /**
     * @var array
     */
    private $mediaParams = [];

    /**
     * @var array
     */
    private $extParams = [];

    /**
     * @param string $pieces
     */
    public function __construct($pieces)
    {
        $pieces = explode(";", $this->cleanHeaderString($pieces));
        $media  = array_shift($pieces);

        if ($media) {
            $this->mediaRange = new ValueRange($media, "/");
            $this->addParams($pieces);
        }
    }

    /**
     * @param $pieces
     * @TODO needs some refactoring
     */
    protected function addParams($pieces)
    {
        $found = false;
        foreach ($pieces as $piece) {

            $param = explode("=", $piece);

            if (count($param) === 2) {
                if ($param[0] === 'q') {
                    $found = true;
                    $this->quality = (float)$param[1];
                } else {
                    if (!$found) {
                        $this->addMediaParam($param[0], $param[1]);
                    } else {
                        $this->addExtParam($param[0], $param[1]);
                    }
                }
            }
        }
    }

    /**
     * @param string $key
     * @param string $value
     */
    private function addMediaParam($key, $value)
    {
        $this->mediaParams[$key] = trim($value);
    }

    /**
     * @param string $key
     * @param string $value
     */
    private function addExtParam($key, $value)
    {
        $this->extParams[$key] = trim($value);
    }

    /**
     * @return \SIAPI\Http\Request\Header\Accept\ValueRange
     */
    public function getMediaRange()
    {
        return $this->mediaRange;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        $str = (string)$this->mediaRange;
        $str = $this->joinParameters($str, $this->mediaParams);
        $str = $this->joinQuantity($str);
        $str = $this->joinParameters($str, $this->extParams);

        return $str;
    }

    /**
     * @param string $str
     * @param array $params
     * @return string
     */
    private function joinParameters($str, array $params)
    {
        array_walk(
            $params,
            function (&$item, $key, $equal = "=") {
                $item = $key . $equal . $item;
            }
        );

        if (!empty($str)) {
            $str .= !empty($params) ? ';' . implode(";", $params) : '';
        }

        return $str;
    }
}
