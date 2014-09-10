<?php

namespace SIAPI\Http\Request\Header\Accept\Collection;

use SIAPI\Http\Request\Header\Accept\Collection;

class AcceptMedia extends Collection
{
    /**
     * @return string
     */
    protected function getAcceptHeaderType()
    {
        return 'AcceptMedia';
    }
}
