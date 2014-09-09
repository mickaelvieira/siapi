<?php

namespace SIAPI\Http\Request\Header;

/**
 * Class AcceptMedia
 * @package SIAPI\Http\Request\Header
 */
class AcceptMedia extends AcceptBase
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
     * @var \SIAPI\Http\Request\Header\ValueRange
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
        // text/html;level=2;q=0.4

        $pieces = explode(";", (string)$pieces);
        $media = array_shift($pieces);

        if ($media) {
            $this->mediaRange = new ValueRange($media, "/");
            $this->addParams($pieces);
        }
    }

    /**
     * @param $pieces
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
     * @return \SIAPI\Http\Request\Header\MediaRange
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
        $str .= $this->joinParameters($this->mediaParams);
        $str .= ";" . "q=" . $this->quality;
        $str .= $this->joinParameters($this->extParams);

        return $str;
    }

    /**
     * @param array $params
     * @return string
     */
    private function joinParameters(array $params)
    {
        array_walk(
            $params,
            function (&$item, $key, $equal = "=") {
                $item = $key . $equal . $item;
            }
        );

        return implode(";", $params);
    }
}
