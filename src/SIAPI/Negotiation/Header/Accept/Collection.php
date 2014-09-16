<?php

namespace SIAPI\Negotiation\Header\Accept;

use SIAPI\Negotiation\Header\Accept\Entity;
use SIAPI\Negotiation\Header\AcceptHeader;

/**
 * Class Collection
 * @package SIAPI\Negotiation\Header\Accept
 * @SuppressWarnings(PHPMD)
 */
abstract class Collection implements AcceptHeader
{
    /**
     * @var string
     */
    protected $defaultValue;

    /**
     * @var string
     */
    protected $acceptHeaderType;

    /**
     * @var string
     */
    protected $entityType;

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
     * @param \SIAPI\Negotiation\Header\Accept\Entity $entity
     */
    public function add(Entity $entity)
    {
        $entity->setIndex(count($this->entities));
        array_push($this->entities, $entity);
    }

    /**
     * @return string
     */
    protected function sort()
    {
        usort($this->entities, function ($ent1, $ent2) {

            /* @var Entity $ent1
             * @var Entity $ent2 */

            $qua1 = $ent1->getQuality();
            $qua2 = $ent2->getQuality();

            if ($qua1 === $qua2) {
                $result = ($ent1->getIndex() < $ent2->getIndex()) ? 1 : -1;
            } elseif ($qua1 < $qua2) {
                $result = -1;
            } else {
                $result = 1;
            }
            return $result;
        });

        $this->entities = array_reverse($this->entities);
    }

    /**
     * @return bool
     */
    public function hasAcceptAllTag()
    {
        $result = false;
        foreach ($this->entities as $entity) {
            /* @var AcceptHeader $entity */
            if ($entity->hasAcceptAllTag()) {
                $result = true;
                break;
            }
        }
        return $result;
    }

    /**
     * @param string $subTag
     * @return bool
     */
    public function hasAcceptAllSubTag($subTag = null)
    {
        $result = false;
        foreach ($this->entities as $entity) {
            /** @var Entity $entity */
            if ($entity->hasTag($subTag) &&
                $entity->hasAcceptAllSubTag()) {
                $result = true;
                break;
            }
        }
        return $result;
    }

    /**
     * @param string $tag
     * @return bool
     */
    public function hasTag($tag)
    {
        $result = false;
        foreach ($this->entities as $entity) {
            /* @var AcceptHeader $entity */
            if ($entity->hasTag($tag)) {
                $result = true;
                break;
            }
        }
        return $result;
    }

    /**
     * @param string $subTag
     * @return bool
     */
    public function hasSubTag($subTag)
    {
        $result = false;
        foreach ($this->entities as $entity) {
            /* @var AcceptHeader $entity */
            if ($entity->hasSubTag($subTag)) {
                $result = true;
                break;
            }
        }
        return $result;
    }

    /**
     * @param string $value
     * @return bool
     */
    public function hasValue($value)
    {
        $result = false;
        foreach ($this->entities as $entity) {
            /* @var AcceptHeader $entity */
            if ($entity->hasValue($value)) {
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
        $values = $this->getValuesFromHeaders($headers);

        foreach ($values as $value) {
            /** @var Entity $entity */
            $entity = EntityFactory::build($this->entityType, $value);
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
        if (count($this->entities) === 0) {
            $valueRange = EntityFactory::build($this->entityType, $this->defaultValue);
            $this->add($valueRange);
        }
    }

    /**
     * @param string|array $headers
     * @return array
     * @TODO this is messy, we need to make a choice whether we want an array or a string
     */
    private function getValuesFromHeaders($headers)
    {
        if (is_array($headers)) {
            $headers = (array_key_exists($this->acceptHeaderType, $headers)) ?
                $headers[$this->acceptHeaderType] : '';
        }
        return is_string($headers) && !empty($headers) ? explode(",", $headers) : [];
    }

    /**
     * @return string
     */
    public function __toString()
    {
        $str = "";
        foreach ($this->entities as $entity) {
            if (!empty($str)) {
                $str .= ",";
            }
            $str .= (string)$entity;
        }
        return $str;
    }
}
