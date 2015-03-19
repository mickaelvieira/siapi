<?php

namespace SIAPI\Component\Search\Query;

final class Params implements \Countable, \IteratorAggregate
{

    /**
     * @var array
     */
    private $whiteList = [
        'target',
        'satellite_of',
        'mission',
        'spacecraft',
        'instrument',
        'pretty',
        'page',
        'q',
    ];

    /**
     * @var Param[]
     */
    private $params = [];

    /**
     * @param array $params
     */
    public function __construct(array $params)
    {
        foreach ($params as $name => $value) {
            if (in_array($name, $this->whiteList)) {
                array_push($this->params, new Param($name, $value));
            }
        }
    }

    /**
     * @return int
     */
    public function count()
    {
        return count($this->params);
    }

    /**
     * @return \ArrayIterator
     */
    public function getIterator()
    {
        return new \ArrayIterator($this->params);
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return implode("&", array_map(function (Param $param) {
            return (string)$param;
        }, $this->params));
    }

    /**
     * @param string $name
     * @return null|string
     */
    public function getParamValue($name)
    {
        $value = null;
        foreach ($this->params as $param) {
            if ($param->getName() === $name) {
                $value = $param->getValue();
            }
        }
        return $value;
    }
}
