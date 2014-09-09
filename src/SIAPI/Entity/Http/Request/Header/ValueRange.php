<?php

namespace SIAPI\Entity\Http\Request\Header;

/**
 * Class Language
 * @package SIAPI\Entity\Http\Request\Header
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
     * @param array $values
     */
    public function __construct(array $values)
    {
        if (isset($values[0])) {
            $this->setValue($values[0]);
        }
        if (isset($values[1])) {
            $this->setSubValue($values[1]);
        }
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
}
