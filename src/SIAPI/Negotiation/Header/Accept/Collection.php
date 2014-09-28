<?php

namespace SIAPI\Negotiation\Header\Accept;

use SIAPI\Negotiation\Header\Accept\Entity;
use SIAPI\Negotiation\Header\AcceptHeader;

/**
 * Class Collection
 * @package SIAPI\Negotiation\Header\Accept
 * @SuppressWarnings(PHPMD.TooManyMethods)
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
        $this->addEntities($headers);
        $this->sort();
    }

    /**
     * {@inheritdoc}
     */
    public function hasAcceptAllTag()
    {
        $result = array_filter($this->entities, function ($entity) {
            /* @var Entity $entity */
            return $entity->hasAcceptAllTag();
        });
        return (count($result) > 0);
    }

    /**
     * {@inheritdoc}
     */
    public function hasAcceptAllSubTag($tag)
    {
        $result = array_filter($this->entities, function ($entity) use ($tag) {
            /* @var Entity $entity */
            return $entity->hasTag($tag) && $entity->hasAcceptAllSubTag();
        });
        return (count($result) > 0);
    }

    /**
     * {@inheritdoc}
     */
    public function hasTag($tag)
    {
        $result = array_filter($this->entities, function ($entity) use ($tag) {
            /* @var Entity $entity */
            return $entity->hasTag($tag);
        });
        return (count($result) > 0);
    }

    /**
     * {@inheritdoc}
     */
    public function hasSubTag($subTag)
    {
        $result = array_filter($this->entities, function ($entity) use ($subTag) {
            /* @var Entity $entity */
            return $entity->hasSubTag($subTag);
        });
        return (count($result) > 0);
    }

    /**
     * {@inheritdoc}
     */
    public function hasValue($value)
    {
        $result = array_filter($this->entities, function ($entity) use ($value) {
            /* @var Entity $entity */
            return $entity->hasValue($value);
        });
        return (count($result) > 0);
    }

    /**
     * @param string $headerValue
     * @return array
     */
    protected function addEntities($headerValue)
    {
        $values = (is_string($headerValue) && !empty($headerValue)) ? explode(",", $headerValue) : [];

        foreach ($values as $value) {
            /** @var Entity $entity */
            $entity = EntityFactory::build($this->entityType, $value);
            if ($entity && $entity->getQuality() > 0) {
                $this->add($entity);
            }
        }
        $this->addDefaultValue();
    }

    /**
     * @param \SIAPI\Negotiation\Header\Accept\Entity $entity
     */
    protected function add(Entity $entity)
    {
        $entity->setIndex(count($this->entities));
        array_push($this->entities, $entity);
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
     * @return string
     */
    protected function sort()
    {
        usort(
            $this->entities,
            function ($ent1, $ent2) {

                /**
                 * @var Entity $ent1
                 * @var Entity $ent2
                 */

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
            }
        );

        $this->entities = array_reverse($this->entities);
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
