<?php

namespace SIAPI\Negotiation\Header\Accept\Values;

use SIAPI\Negotiation\Header\Accept\Values;

/**
 * Class Language
 * @package SIAPI\Negotiation\Header\Accept\Collection
 */
class Language extends Values
{
    /**
     * {@inheritdoc}
     */
    protected $defaultValue = '*';

    /**
     * {@inheritdoc}
     */
    protected $entityType = 'Language';
}
