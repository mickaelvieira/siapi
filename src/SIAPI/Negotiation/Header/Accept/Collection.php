<?php

namespace SIAPI\Negotiation\Header\Accept;

use IteratorAggregate;
use ArrayIterator;
use SIAPI\Negotiation\Header\Accept\Entity;

/**
 * Class Collection
 * @package SIAPI\Negotiation\Header\Accept
 */
abstract class Collection implements IteratorAggregate
{
    /**
     * @param array $entities
     */
    public function __construct(array $entities = [])
    {
        $this->entities = $entities;
        $this->sort();
    }

    /**
     * @param $item
     */
    public function add($item)
    {
        array_push($this->entities, $item);
    }

    /**
     * @return string
     */
    abstract protected function sort();

    /**
     * @return string
     */
    abstract protected function getAcceptHeaderType();

    /**
     * @return bool
     */
    abstract public function hasAcceptAll();

    /**
     * @param string $header
     * @return static
     * @TODO this does not seem to be useful.
     * We better use the constructor
     */
    public static function createFromString($header)
    {
        $entities = [];
        $values   = explode(",", (string)$header);

        $entityClassName = static::getEntityClassName();

        foreach ($values as $value) {
            $entity = new $entityClassName($value);
            if ($entity) {
                array_push($entities, $entity);
            }
        }

        return new static($entities);
    }

    /**
     * @return string
     */
    protected function getEntityClassName()
    {
        return __NAMESPACE__ . "\\Entity\\" . static::getAcceptHeaderType();
    }

    /**
     * @return string
     */
    public function __toString()
    {
        $str = "";
        foreach ($this as $entity) {
            if (!empty($str)) {
                $str .= ",";
            }
            $str .= (string)$entity;
        }
        return $str;
    }

    /**
     * @return ArrayIterator
     */
    public function getIterator()
    {
        return new ArrayIterator($this->entities);
    }
}
