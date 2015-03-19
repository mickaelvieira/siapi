<?php

namespace SIAPI\Component\Search\Result;

use SIAPI\Component\Search\Result;

final class Facet
{
    /**
     * @var string
     */
    private $value;

    /**
     * @var string
     */
    private $name;

    /**
     * @var int
     */
    private $docCount;

    /**
     * @param string $name
     * @param string $value
     * @param int    $docCount
     */
    public function __construct($name, $value, $docCount)
    {
        $this->name     = (string)$name;
        $this->value    = (string)$value;
        $this->docCount = (int)$docCount;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @return int
     */
    public function getDocCount()
    {
        return $this->docCount;
    }
}
