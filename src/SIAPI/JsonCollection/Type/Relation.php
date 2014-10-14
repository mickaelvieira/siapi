<?php

namespace SIAPI\JsonCollection\Type;

final class Relation
{
    /**
     *
     */
    private function __construct()
    {
    }

    const COLLECTION = 'collection';
    const TEMPLATE   = 'template';
    const QUERIES    = 'queries';
    const FORM       = 'form';
    const ITEM       = 'item';
}