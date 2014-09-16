<?php

namespace SIAPI\Negotiation\Header\Accept;

use SIAPI\Negotiation\Header\AcceptHeader;

/**
 * Class Entity
 * @package SIAPI\Negotiation\Header\Accept
 */
abstract class Entity implements AcceptHeader
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
     * @var int
     */
    protected $index = 0;

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

    abstract public function hasAcceptAllSubTag();

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
     * @param int $originalOrder
     */
    public function setIndex($originalOrder)
    {
        $this->index = $originalOrder;
    }

    /**
     * @return int
     */
    public function getIndex()
    {
        return $this->index;
    }

    /**
     * @return string
     */
    public function getValue()
    {
        return (string)$this->valueRange;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->joinQuantity(
            $this->getValue()
        );
    }

    /**
     * @return bool
     */
    public function hasAcceptAllTag()
    {
        return ($this->valueRange->getValue() === '*');
    }

    /**
     * @param string $tag
     * @return bool
     */
    public function hasTag($tag)
    {
        return ($this->valueRange->getValue() === $tag);
    }

    /**
     * @param string $subSubTag
     * @return bool
     */
    public function hasSubTag($subSubTag)
    {
        return ($this->valueRange->getSubValue() === $subSubTag);
    }

    /**
     * @param string $value
     * @return bool
     */
    public function hasValue($value)
    {
        return ((string)$this->valueRange === $value);
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
