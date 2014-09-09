<?php

namespace SIAPI\Negotiation\Negotiator;

use SIAPI\Http\Request\Header\AcceptMedia;
use SIAPI\Negotiation\Negotiator;

/**
 * Class Media
 * @package SIAPI\Negotiation\Negotiator
 */
class Media extends Negotiator
{
    /**
     * {@inheritDoc}
     */
    protected function getHeaderName()
    {
        return 'Accept';
    }

    /**
     * @param string $value
     * @return array
     */
    protected function parseAcceptedValue($value)
    {
        $accept = null;
        // https://github.com/zendframework/zf2/blob/master/library/Zend/Http/Header/AbstractAccept.php
        // https://github.com/zendframework/zf2/blob/master/library/Zend/Http/Header/Accept.php
        // https://github.com/zendframework/zf2/blob/master/library/Zend/Http/Header/AcceptLanguage.php
        // https://github.com/zendframework/zf2/blob/master/library/Zend/Http/Header/AcceptCharset.php
        // https://github.com/adoy/Accept-Header-Parser/blob/master/AcceptHeader.php

        return $accept;
    }

    /**
     * {@inheritDoc}
     */
    protected function getParsingRegex()
    {
        return "";
    }
}
