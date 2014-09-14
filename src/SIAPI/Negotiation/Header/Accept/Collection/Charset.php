<?php

namespace SIAPI\Negotiation\Header\Accept\Collection;

use SIAPI\Negotiation\Header\Accept\Collection;

/**
 * Class Charset
 * @package SIAPI\Negotiation\Header\Accept\Collection
 */
class Charset extends Collection
{
    const DEFAULT_VALUE = 'iso-8859-1;q=1';

    /**
     * @param string $charset
     * @return bool
     */
    public function hasCharset($charset)
    {
        $result = false;
        foreach ($this->entities as $acceptHeader) {
            /** @var \SIAPI\Negotiation\Header\Accept\Entity\Charset $acceptHeader */
            if ($acceptHeader->hasTag($charset)) {
                $result = true;
                break;
            }
        }
        return $result;
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
            return 0;
        }
        if ($item1->getQuality() < $item2->getQuality()) {
            return -1;
        } else {
            return 1;
        }
    }

    /**
     * @return string
     */
    protected function getAcceptHeaderType()
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
    protected function addDefaultValue()
    {
        if (!$this->hasAcceptAll() && !$this->hasCharset(self::DEFAULT_VALUE)) {
            $className  = static::getEntityClassName();
            $valueRange = new $className($this->getDefaultValue());
            $this->add($valueRange);
        }
    }
}
