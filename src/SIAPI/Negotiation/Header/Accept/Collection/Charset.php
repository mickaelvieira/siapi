<?php

namespace SIAPI\Negotiation\Header\Accept\Collection;

use SIAPI\Negotiation\Header\Accept\Collection;

/**
 * Class Charset
 * @package SIAPI\Negotiation\Header\Accept\Collection
 */
class Charset extends Collection
{
    const DEFAULT_VALUE = '*';

    /**
     * {@inheritdoc}
     */
    public function __construct($headers)
    {
        $this->parseHeadersString($headers);
        $this->addDefaultValue();
        $this->addIso88591IfNotPresent();
        $this->sort();
    }

    /**
     *
     */
    protected function sort()
    {
        usort($this->entities, [$this, 'sortEntities']);
        $this->entities = array_reverse($this->entities);
    }

    /**
     * @param  \SIAPI\Negotiation\Header\Accept\Entity $item1
     * @param  \SIAPI\Negotiation\Header\Accept\Entity $item2
     * @return int
     */
    private function sortEntities($item1, $item2)
    {
        if ($item1->getQuality() === $item2->getQuality()) {
            if ($item1->getOriginalOrder() < $item2->getOriginalOrder()) {
                $result = 1;
            } else {
                $result = -1;
            }
        } elseif ($item1->getQuality() < $item2->getQuality()) {
            $result = -1;
        } else {
            $result = 1;
        }
        return $result;
    }

    /**
     * {@inheritdoc}
     */
    protected function getAcceptHeaderType()
    {
        return 'Accept-Charset';
    }

    /**
     * {@inheritdoc}
     */
    protected function getAcceptHeaderClassName()
    {
        return 'Charset';
    }

    /**
     * @return string
     */
    protected function getDefaultValue()
    {
        return self::DEFAULT_VALUE;
    }

    /**
     * @link http://www.w3.org/Protocols/rfc2616/rfc2616-sec14.html
     * If no "*" is present in an Accept-Charset field,
     * then all character sets not explicitly mentioned get a quality value of 0,
     * except for ISO-8859-1, which gets a quality value of 1 if not explicitly mentioned.
     */
    private function addIso88591IfNotPresent()
    {
        if (!$this->hasAcceptAll() && !$this->hasTag(self::DEFAULT_VALUE)) {
            $className  = static::getEntityClassName();
            $valueRange = new $className('iso-8859-1;q=1');
            $this->add($valueRange);
        }
    }
}
