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

        $entityClassName = static::getEntityFullClassName();

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
    protected function getEntityFullClassName()
    {
        //$entityClassName = static::getEntityClassName();
        //$entityNameSpace = static::getEntityNameSpace();

        return __NAMESPACE__ . "\\Entity\\" . static::getAcceptHeaderType();
    }

    /**
     * @return string
     */
    protected function getEntityClassName()
    {
        $class = end(explode("\\", static::getClassName()));
        if ($class === 'Accept') {
            $class = 'AcceptMedia';
        }
        return $class;
    }

    /**
     * @return string
     */
    protected function getEntityNameSpace()
    {
        $namespaces = explode("\\", static::getNameSpace());
        array_pop($namespaces);
        //array_push($nameSpaces, 'Entity'); // We'll move entities in a sub folder

        return implode("\\", $namespaces);
    }

    /**
     * @return string
     */
    protected function getClassName()
    {
        return __CLASS__;
    }

    /**
     * @return string
     */
    protected function getNameSpace()
    {
        return __NAMESPACE__;
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
