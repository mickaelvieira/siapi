<?php

namespace SIAPI\Negotiation\Header\Accept\Collection;

use SIAPI\Negotiation\Header\Accept\Collection;

/**
 * Class Language
 * @package SIAPI\Negotiation\Header\Accept\Collection
 */
class Language extends Collection
{
    /**
     * {@inheritdoc}
     */
    protected $defaultValue = '*';

    /**
     * {@inheritdoc}
     */
    protected $acceptHeaderType = 'Accept-Language';

    /**
     * {@inheritdoc}
     */
    protected $entityType = 'Language';
}
