<?php

namespace SIAPI\Http\Request\Header;

/**
 * Class Language
 * @package SIAPI\Http\Request\Header
 */
class ValueRange
{
    /**
     * @var string
     */
    private $value;

    /**
     * @var string
     */
    private $subValue;

    /**
     * @var string
     */
    private $delimiter = "";

    /**
     * @param string $range
     * @param string $delimiter
     */
    public function __construct($range, $delimiter = "")
    {
        $this->delimiter = $delimiter;
        $this->parseRange($range);
    }

    /**
     * @param string $value
     */
    public function setValue($value)
    {
        $this->value = (string)$value;
    }

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param string $subValue
     */
    public function setSubValue($subValue)
    {
        $this->subValue = (string)$subValue;
    }

    /**
     * @return string
     */
    public function getSubValue()
    {
        return $this->subValue;
    }

    /**
     * @param string $range
     */
    private function parseRange($range)
    {
        $values = $this->getValues($range);
        if (isset($values[0])) {
            $this->setValue($values[0]);
        }
        if (isset($values[1])) {
            $this->setSubValue($values[1]);
        }
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return implode(
            $this->delimiter,
            array_filter(
                get_object_vars($this),
                function ($value) {
                    return (!is_null($value));
                }
            )
        );
    }

    /**
     * @param string $range
     * @return array
     */
    private function getValues($range)
    {
        if (!empty($this->delimiter)) {
            $values = explode($this->delimiter, $range);
        } else {
            $values = [$range];
        }
        return $values;
    }
}
