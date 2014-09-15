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
    protected $entityClassName = 'Language';

    /**
     * @param string $tag
     * @return bool
     */
    public function hasAcceptAllSubTag($tag)
    {
        $result = false;
        foreach ($this->entities as $acceptHeader) {
            /** @var \SIAPI\Negotiation\Header\Accept\Entity\Language $acceptHeader */
            if ($acceptHeader->hasTag($tag) &&
                $acceptHeader->hasAcceptAllSubTag()) {
                $result = true;
                break;
            }
        }
        return $result;
    }
}
