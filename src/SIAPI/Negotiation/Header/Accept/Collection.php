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
     * @param string|array $headers
     */
    public function __construct($headers)
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
    abstract protected function getAcceptHeaderClassName();

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
        if (is_array($headers)) {
            $headers = $this->getHeaderStringFromHeadersArray($headers);
        }
        $values = $this->getValuesFromHeaderString($headers);

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
        return __NAMESPACE__ . "\\Entity\\" . static::getAcceptHeaderClassName();
    }

    /**
     * @param array $headers
     * @return string
     */
    private function getHeaderStringFromHeadersArray(array $headers)
    {
        $type = static::getAcceptHeaderType();
        return (array_key_exists($type, $headers)) ? $headers[$type] : '';
    }

    /**
     * @param string $headers
     * @return array
     */
    private function getValuesFromHeaderString($headers)
    {
        return is_string($headers) && !empty($headers) ? explode(",", $headers) : [];
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
