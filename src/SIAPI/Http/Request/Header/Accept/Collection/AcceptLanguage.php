<?php

namespace SIAPI\Http\Request\Header\Accept\Collection;

use SIAPI\Http\Request\Header\Accept\Collection;

/**
 * Class AcceptLanguage
 * @package SIAPI\Http\Request\Header\Accept\Collection
 */
class AcceptLanguage extends Collection
{
    /**
     * @return string
     */
    protected function getAcceptHeaderType()
    {
        return 'AcceptLanguage';
    }
}
