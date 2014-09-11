<?php

namespace SIAPI\Negotiation\Header\Accept\Collection;

use SIAPI\Negotiation\Header\Accept\Collection;

/**
 * Class Media
 * @package SIAPI\Negotiation\Header\Accept\Collection
 */
class Media extends Collection
{
    /**
     * @return bool
     */
    public function hasAcceptAll()
    {
        $result = false;
        foreach ($this->entities as $acceptHeader) {
            /** @var \SIAPI\Negotiation\Header\Accept\Entity\Media $acceptHeader */
            if ($acceptHeader->hasAcceptAll()) {
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
    public function acceptAllSubTypes($type)
    {
        $result = false;
        foreach ($this->entities as $acceptHeader) {
            /** @var \SIAPI\Negotiation\Header\Accept\Entity\Media $acceptHeader */
            if ($acceptHeader->hasType($type) &&
                $acceptHeader->hasAcceptAllSubType()) {
                $result = true;
                break;
            }
        }
        return $result;
    }

    /**
     * @return string
     */
    protected function getAcceptHeaderType()
    {
        return 'Media';
    }

    /**
     *
     */
    public function sort()
    {
        // @TODO Sortable logic
    }
}
