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
     * @var array
     */
    protected $entities = [];

    /**
     * @param string $headers
     */
    public function __construct($headers = '')
    {
        $this->parseHeadersString($headers);
        $this->addDefaultValue();
        $this->sort();
    }

    /**
     * @param \SIAPI\Negotiation\Header\Accept\Entity $item
     */
    public function add($item)
    {
        $item->setOriginalOrder(count($this->entities));
        array_push($this->entities, $item);
    }

    /**
     * @return bool
     */
    public function isEmpty()
    {
        return (count($this->entities) === 0);
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
     * @return string
     */
    abstract protected function getDefaultValue();

    /**
     * @return bool
     */
    public function hasAcceptAll()
    {
        $result = false;
        foreach ($this->entities as $acceptHeader) {
            /** @var \SIAPI\Negotiation\Header\Accept\Entity\Charset $acceptHeader */
            if ($acceptHeader->hasAcceptAllTag()) {
                $result = true;
                break;
            }
        }
        return $result;
    }

    /**
     * @param string $headers
     * @return array
     */
    protected function parseHeadersString($headers)
    {
        //$entities = [];

        $values = is_string($headers) && !empty($headers) ? explode(",", $headers) : [];

        $className = static::getEntityClassName();

        foreach ($values as $value) {
            /** @var \SIAPI\Negotiation\Header\Accept\Entity $entity */
            /**
             * See. http://www.w3.org/Protocols/rfc2616/rfc2616-sec3.html#sec3.9
             * If a parameter has a quality value of 0, then content
             * with this parameter is `not acceptable' for the client.
             */
            $entity = new $className($value);
            if ($entity && $entity->getQuality() > 0) {
                $this->add($entity);
            }
        }
        //return $entities;
    }

    /**
     * @link http://www.w3.org/Protocols/rfc2616/rfc2616-sec14.html
     */
    protected function addDefaultValue()
    {
        if ($this->isEmpty()) {
            $className  = static::getEntityClassName();
            $valueRange = new $className($this->getDefaultValue());
            $this->add($valueRange);
        }
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
