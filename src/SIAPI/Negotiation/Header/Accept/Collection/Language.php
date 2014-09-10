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
