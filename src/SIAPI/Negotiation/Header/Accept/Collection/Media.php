<?php

namespace SIAPI\Negotiation\Header\Accept\Collection;

use SIAPI\Negotiation\Header\Accept\Collection;

/**
 * Class Media
 * @package SIAPI\Negotiation\Header\Accept\Collection
 */
class Media extends Collection
{
    const DEFAULT_VALUE = '*/*;q=1';

    /**
     * @return bool
     */
    public function hasAcceptAll()
    {
        $result = false;
        foreach ($this->entities as $acceptHeader) {
            /** @var \SIAPI\Negotiation\Header\Accept\Entity\Media $acceptHeader */
            if ($acceptHeader->hasAcceptAllTag()) {
                $result = true;
                break;
            }
        }
        return $result;
    }

    /**
     * @param string $type
     * @return bool
     */
    public function hasAcceptAllSubTypes($type)
    {
        $result = false;
        foreach ($this->entities as $acceptHeader) {
            /** @var \SIAPI\Negotiation\Header\Accept\Entity\Media $acceptHeader */
            if ($acceptHeader->hasMediaType($type) &&
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
        // @TODO Sortable logic
    }

    /**
     * @return string
     */
    protected function getAcceptHeaderType()
    {
        return 'Media';
    }

    /**
     * @return string
     */
    protected function getDefaultValue()
    {
        return self::DEFAULT_VALUE;
    }
}
