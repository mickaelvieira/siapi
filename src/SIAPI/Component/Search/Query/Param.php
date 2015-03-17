<?php


namespace SIAPI\Component\Search\Query;


final class Param
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $value;

    /**
     * @param $name
     * @param $value
     */
    public function __construct($name, $value)
    {
        $this->name  = (string)$name;
        $this->value = (string)$value;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @retunn string
     */
    public function getValue()
    {
        return $this->value;
    }
}
