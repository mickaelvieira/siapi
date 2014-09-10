<?php

namespace SIAPI\Http\Request\Header\Accept;

use SIAPI\Collection\Collection as BaseCollection;
use SIAPI\Http\Request\Header\Accept\Entity;

abstract class Collection extends BaseCollection
{
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
        $entities = array();
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
