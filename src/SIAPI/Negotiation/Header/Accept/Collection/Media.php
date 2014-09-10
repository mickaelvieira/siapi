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
