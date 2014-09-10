<?php

namespace SIAPI\Negotiation\Header\Accept\Collection;

use SIAPI\Negotiation\Header\Accept\Collection;

/**
 * Class Charset
 * @package SIAPI\Negotiation\Header\Accept\Collection
 */
class Charset extends Collection
{
    /**
     * @return string
     */
    protected function getAcceptHeaderType()
    {
        return 'Charset';
    }

    /**
     *
     */
    public function sort()
    {
        // @TODO Sortable logic
    }
}
