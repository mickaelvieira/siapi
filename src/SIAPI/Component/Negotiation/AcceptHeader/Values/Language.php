<?php

namespace SIAPI\Component\Negotiation\AcceptHeader\Values;

use SIAPI\Component\Negotiation\AcceptHeader\Values;

/**
 * Class Language
 * @package SIAPI\Component\Negotiation\AcceptHeader\JsonCollection
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
