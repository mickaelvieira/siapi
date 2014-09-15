<?php

namespace SIAPI\Negotiation\Header\Accept\Collection;

use SIAPI\Negotiation\Header\Accept\Collection;

/**
 * Class Language
 * @package SIAPI\Negotiation\Header\Accept\Collection
 */
class Language extends Collection
{
    const DEFAULT_VALUE = '*';

    /**
     * @param string $tag
     * @return bool
     */
    public function hasAcceptAllSubTag($tag)
    {
        $result = false;
        foreach ($this->entities as $acceptHeader) {
            /** @var \SIAPI\Negotiation\Header\Accept\Entity\Language $acceptHeader */
            if ($acceptHeader->hasTag($tag) &&
                $acceptHeader->hasAcceptAllSubTag()) {
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
            if ($item1->getIndex() < $item2->getIndex()) {
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
     * @return string
     */
    protected function getAcceptHeaderType()
    {
        return 'Accept-Language';
    }

    /**
     * {@inheritdoc}
     */
    protected function getAcceptHeaderClassName()
    {
        return 'Language';
    }

    /**
     * @return string
     */
    protected function getDefaultValue()
    {
        return self::DEFAULT_VALUE;
    }
}
