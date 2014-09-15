<?php

namespace SIAPI\Negotiation\Header\Accept\Collection;

use SIAPI\Negotiation\Header\Accept\Collection;

/**
 * Class Media
 * @package SIAPI\Negotiation\Header\Accept\Collection
 */
class Media extends Collection
{
    /**
     * {@inheritdoc}
     */
    protected $defaultValue = '*/*;q=1';

    /**
     * {@inheritdoc}
     */
    protected $acceptHeaderType = 'Charset';

    /**
     * {@inheritdoc}
     */
    protected $entityClassName = 'Media';

    /**
     * @param string $type
     * @return bool
     */
    public function hasAcceptAllSubTypes($type)
    {
        $result = false;
        foreach ($this->entities as $item) {
            /** @var \SIAPI\Negotiation\Header\Accept\Entity\Media $item */
            if ($item->hasTag($type) &&
                $item->hasAcceptAllSubTag()) {
                $result = true;
                break;
            }
        }
        return $result;
    }

    /**
     *
     */
    protected function sort()
    {
        // @TODO Sortable logic
    }
}
