<?php

namespace SIAPI\Negotiation\Header\Accept\Collection;

use SIAPI\Negotiation\Header\Accept\Collection;

/**
 * Class Language
 * @package SIAPI\Negotiation\Header\Accept\Collection
 */
class Language extends Collection
{
    /**
     * @return bool
     */
    public function hasAcceptAll()
    {
        $result = false;
        foreach ($this->entities as $acceptHeader) {
            /** @var \SIAPI\Negotiation\Header\Accept\Entity\Language $acceptHeader */
            if ($acceptHeader->hasAcceptAll()) {
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
        return 'Language';
    }

    /**
     *
     */
    public function sort()
    {
        // @TODO Sortable logic
    }
}
