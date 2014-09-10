<?php

namespace SIAPI\Negotiation\Header\Accept;

use SIAPI\Collection\Sortable;
use SIAPI\Collection\Collection as BaseCollection;
use SIAPI\Negotiation\Header\Accept\Entity;

/**
 * Class Collection
 * @package SIAPI\Negotiation\Header\Accept
 */
abstract class Collection extends BaseCollection implements Sortable
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
     * @return string
     */
    abstract protected function getAcceptHeaderType();

    /**
     * @param string $header
     * @return static
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
}
