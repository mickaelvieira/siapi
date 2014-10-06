<?php

namespace SIAPI\Negotiation\AcceptHeader;

use SIAPI\Negotiation\AcceptHeader;

class Values extends Collection implements AcceptHeader
{
    /**
     * @var string
     */
    protected $valueRangeDelimiter = "";

    /**
     * @var string
     */
    protected $defaultValue;

    /**
     * @var string
     */
    protected $entityType;

    /**
     * @param string|array $headers
     */
    public function __construct($headers)
    {
        $this->addValues($headers);
        $this->sort();
    }

    /**
     * {@inheritdoc}
     */
    public function hasAcceptAllTag()
    {
        $result = array_filter($this->entities, function ($entity) {
            /* @var Value $entity */
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
            /* @var Value $entity */
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
            /* @var Value $entity */
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
            /* @var Value $entity */
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
            /* @var Value $entity */
            return $entity->hasValue($value);
        });
        return (count($result) > 0);
    }

    /**
     * {@inheritdoc}
     */
    public function findFirstMatchingValue(array $values)
    {
        $best = null;
        foreach ($this->entities as $value) {
            /** @var Value $value */
            if (array_search($value->getValue(), $values, true) !== false) {
                $best = $value->getValue();
                break;
            }
        }
        return $best;
    }

    /**
     * @param array $values
     * @return null
     */
    public function findFirstMatchingSubValue(array $values)
    {
        $value = null;
        foreach ($values as $val) {
            $range = new ValueRange($val, $this->valueRangeDelimiter);
            if ($this->hasTag($range->getValue()) && $this->hasAcceptAllSubTag($range->getValue())) {
                $value = $val;
                break;
            }
        }
        return $value;
    }

    /**
     * @param string $headerValue
     * @return array
     */
    protected function addValues($headerValue)
    {
        $values = (is_string($headerValue) && !empty($headerValue)) ? explode(",", $headerValue) : [];

        foreach ($values as $value) {
            /** @var Value $entity */
            $entity = ValueFactory::build($this->entityType, $value);
            if ($entity && $entity->getQuality() > 0) {
                $this->add($entity);
            }
        }
        $this->addDefaultValueIfNoneIsDefined();
    }

    /**
     * @link http://www.w3.org/Protocols/rfc2616/rfc2616-sec14.html
     */
    protected function addDefaultValueIfNoneIsDefined()
    {
        if (count($this->entities) === 0) {
            $valueRange = ValueFactory::build($this->entityType, $this->defaultValue);
            $this->add($valueRange);
        }
    }

    protected function sort()
    {
        usort($this->entities, array($this, 'sortCallback'));
        $this->entities = array_reverse($this->entities);
    }

    /**
     * @param Value $val1
     * @param Value $val2
     * @return int
     */
    protected function sortCallback(Value $val1, Value $val2)
    {
        $qua1 = $val1->getQuality();
        $qua2 = $val2->getQuality();

        if ($qua1 === $qua2) {
            $result = ($val1->getIndex() < $val2->getIndex()) ? 1 : -1;
        } elseif ($qua1 < $qua2) {
            $result = -1;
        } else {
            $result = 1;
        }
        return $result;
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