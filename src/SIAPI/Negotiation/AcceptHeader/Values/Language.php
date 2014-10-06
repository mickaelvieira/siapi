<?php

namespace SIAPI\Negotiation\AcceptHeader\Values;

use SIAPI\Negotiation\AcceptHeader\Values;

/**
 * Class Language
 * @package SIAPI\Negotiation\AcceptHeader\Collection
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
