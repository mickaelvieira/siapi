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
