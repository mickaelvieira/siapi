<?php

namespace SIAPI\Negotiation\Header\Accept\Collection;

use SIAPI\Negotiation\Header\Accept\Collection;
use SIAPI\Negotiation\Header\Accept\Entity\Charset as CharsetEntity;

/**
 * Class Charset
 * @package SIAPI\Negotiation\Header\Accept\Collection
 */
class Charset extends Collection
{
    /**
     * @param array $entities
     */
    public function __construct(array $entities = [])
    {
        $this->entities = $entities;
        $this->addISO88591IfNotPresent();
        $this->sort();
    }

    /**
     * The special value "*", if present in the Accept-Charset field,
     * matches every character set (including ISO-8859-1) which is not mentioned elsewhere in the Accept-Charset field.
     * If no "*" is present in an Accept-Charset field,
     * then all character sets not explicitly mentioned get a quality value of 0,
     * except for ISO-8859-1, which gets a quality value of 1 if not explicitly mentioned.
     */
    private function addISO88591IfNotPresent()
    {
        if (!$this->acceptAll() && !$this->hasCharset('ISO-8859-1')) {
            $charset = new CharsetEntity('ISO-8859-1;q=1');
            $this->add($charset);
        }
    }

    /**
     * @return bool
     */
    public function acceptAll()
    {
        $result = false;
        foreach ($this->entities as $acceptHeader) {
            /** @var \SIAPI\Negotiation\Header\Accept\Entity\Charset $acceptHeader */
            if ($acceptHeader->isAll()) {
                $result = true;
                break;
            }
        }
        return $result;
    }

    /**
     * @param string $charset
     * @return bool
     */
    public function hasCharset($charset)
    {
        $result = false;
        foreach ($this->entities as $acceptHeader) {
            /** @var \SIAPI\Negotiation\Header\Accept\Entity\Charset $acceptHeader */
            if ($acceptHeader->getCharset() === $charset) {
                $result = true;
                break;
            }
        }
        return $result;
    }

    /**
     * @return string
     */
    protected function getAcceptHeaderType()
    {
        return 'Charset';
    }

    /**
     *
     */
    public function sort()
    {
        // @TODO Sortable logic
    }
}
