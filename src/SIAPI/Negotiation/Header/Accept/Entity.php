<?php

namespace SIAPI\Negotiation\Header\Accept;

/**
 * Class Entity
 * @package SIAPI\Negotiation\Header\Accept
 */
abstract class Entity
{
    /**
     * @var \SIAPI\Negotiation\Header\Accept\ValueRange
     */
    protected $valueRange;
    /**
     * @var float
     */
    protected $quality = 1.0;

    /**
     * @param string $pieces
     */
    public function __construct($pieces)
    {
        $pieces = explode(";", $this->cleanHeaderString($pieces));
        $values = array_shift($pieces);

        if ($values) {
            $this->valueRange = $this->getValueRangeEntity($values);
            $this->addParams($pieces);
        }
    }

    /**
     * @param string $values
     * @return \SIAPI\Negotiation\Header\Accept\ValueRange
     */
    abstract protected function getValueRangeEntity($values);

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
    public function getValueRange()
    {
        return (string)$this->valueRange;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->joinQuantity(
            $this->getValueRange()
        );
    }

    /**
     * @return bool
     */
    public function hasAcceptAll()
    {
        return ($this->valueRange->getValue() === '*');
    }

    /**
     * @param string $header
     * @return string
     */
    private function cleanHeaderString($header)
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
