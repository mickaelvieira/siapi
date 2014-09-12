<?php

namespace SIAPI\Negotiation\Negotiator;

use Traversable;
use SIAPI\Negotiation\Matcher;
use SIAPI\Negotiation\Strategy;
use SIAPI\Negotiation\Negotiator;
use SIAPI\Negotiation\Header\Accept\Collection;

/**
 * Class Media
 * @package SIAPI\Negotiation\Negotiator
 */
class Media extends Negotiator implements Matcher
{
    /**
     * {@inheritdoc}
     */
    public function __construct(Traversable $collection, Strategy $strategy)
    {
        parent::__construct($collection, $strategy);
    }

    /**
     * {@inheritdoc}
     */
    public function match(array $supported)
    {

    }

    /**
     * @param string $header
     * @return array
     */
    /*protected function getCollection($header)
    {
        return Media::createFromString($header);
        // https://github.com/zendframework/zf2/blob/master/library/Zend/Http/Header/AbstractAccept.php
        // https://github.com/zendframework/zf2/blob/master/library/Zend/Http/Header/Accept.php
        // https://github.com/zendframework/zf2/blob/master/library/Zend/Http/Header/AcceptLanguage.php
        // https://github.com/zendframework/zf2/blob/master/library/Zend/Http/Header/AcceptCharset.php
        // https://github.com/adoy/Accept-Header-Parser/blob/master/AcceptHeader.php
    }*/
}
