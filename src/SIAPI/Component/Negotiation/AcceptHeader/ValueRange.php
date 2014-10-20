<?php

namespace SIAPI\Component\Negotiation\AcceptHeader;

/**
 * Class ValueRange
 * @package SIAPI\Component\Negotiation\AcceptHeader
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
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @return string
     */
    public function getSubValue()
    {
        return $this->subValue;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return [
            'value'    => $this->value,
            'subValue' => $this->subValue,
        ];
    }
    /**
     * @return string
     */
    public function __toString()
    {
        $properties = $this->toArray();
        return implode(
            $this->delimiter,
            array_filter(
                $properties,
                function ($value) {
                    return (!is_null($value) && !empty($value));
                }
            )
        );
    }

    /**
     * @param string $range
     */
    private function parseRange($range)
    {
        $values = $this->getValuesFromString($range);
        if (isset($values[0]) && !empty($values[0])) {
            $this->setValue($values[0]);
        }
        if (isset($values[1]) && !empty($values[1])) {
            $this->setSubValue($values[1]);
        }
    }

    /**
     * @param string $range
     * @return array
     */
    private function getValuesFromString($range)
    {
        if (!empty($this->delimiter)) {
            $values = explode($this->delimiter, $range);
        } else {
            $values = [
                $range
            ];
        }
        return $values;
    }

    /**
     * @param string $value
     */
    private function setValue($value)
    {
        $this->value = (string)$value;
    }

    /**
     * @param string $subValue
     */
    private function setSubValue($subValue)
    {
        $this->subValue = (string)$subValue;
    }
}
