<?php

namespace SIAPI\Negotiation\Header\Accept\Collection;

use SIAPI\Negotiation\Header\Accept\EntityFactory;
use SIAPI\Negotiation\Header\Accept\Collection;

/**
 * Class Charset
 * @package SIAPI\Negotiation\Header\Accept\Collection
 */
class Charset extends Collection
{
    /**
     * {@inheritdoc}
     */
    protected $defaultValue = '*';

    /**
     * {@inheritdoc}
     */
    protected $acceptHeaderType = 'Accept-Charset';

    /**
     * {@inheritdoc}
     */
    protected $entityType = 'Charset';

    /**
     * {@inheritdoc}
     */
    public function __construct($headers)
    {
        $this->parseHeadersString($headers);
        $this->addDefaultValue();
        $this->addIso88591IfNotPresent();
        $this->sort();
    }

    /**
     * @link http://www.w3.org/Protocols/rfc2616/rfc2616-sec14.html
     * If no "*" is present in an Accept-Charset field,
     * then all character sets not explicitly mentioned get a quality value of 0,
     * except for ISO-8859-1, which gets a quality value of 1 if not explicitly mentioned.
     */
    private function addIso88591IfNotPresent()
    {
        if (!$this->hasAcceptAllTag() && !$this->hasTag('iso-8859-1;q=1')) {
            $valueRange = EntityFactory::build($this->entityType, 'iso-8859-1;q=1');
            $this->add($valueRange);
        }
    }
}
