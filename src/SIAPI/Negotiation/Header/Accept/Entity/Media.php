<?php

namespace SIAPI\Negotiation\Header\Accept\Entity;

use SIAPI\Negotiation\Header\Accept\Entity;
use SIAPI\Negotiation\Header\Accept\ValueRange;

/**
 * Class Media
 * @package SIAPI\Negotiation\Header\Accept\Entity
 */
class Media extends Entity
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
     * @var array
     */
    private $mediaParams = [];

    /**
     * @var array
     */
    private $extParams = [];

    /**
     * {@inheritdoc}
     */
    protected function getValueRangeEntity($values)
    {
        return new ValueRange($values, "/");
    }

    /**
     * @return bool
     */
    public function hasAcceptAll()
    {
        return (
            ($this->valueRange) &&
            ($this->valueRange->getValue() === '*') &&
            ($this->valueRange->getSubValue() === '*')
        );
    }

    /**
     * @return bool
     */
    public function hasAcceptAllSubType()
    {
        return ($this->valueRange->getSubValue() === '*');
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
     * @param string $type
     * @return bool
     */
    public function hasType($type)
    {
        return ($this->valueRange->getValue() === $type);
    }

    /**
     * @return string
     */
    public function __toString()
    {
        $str = $this->getValueRange();
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
