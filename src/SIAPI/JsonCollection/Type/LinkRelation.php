<?php

namespace SIAPI\JsonCollection\Type;

final class LinkRelation
{
    /**
     *
     */
    private function __construct()
    {
    }

    const FORM       = 'form';
    const COLLECTION = 'collection';
    const ITEM       = 'item';
    const TEMPLATE   = 'template';
    const QUERIES    = 'queries';
} 