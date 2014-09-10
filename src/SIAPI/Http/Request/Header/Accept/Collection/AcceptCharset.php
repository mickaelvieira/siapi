<?php

namespace SIAPI\Http\Request\Header\Accept\Collection;

use SIAPI\Http\Request\Header\Accept\Collection;

/**
 * Class AcceptCharset
 * @package SIAPI\Http\Request\Header\Accept\Collection
 */
class AcceptCharset extends Collection
{
    /**
     * @return string
     */
    protected function getAcceptHeaderType()
    {
        return 'AcceptCharset';
    }
}
