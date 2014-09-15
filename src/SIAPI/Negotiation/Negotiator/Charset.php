<?php

namespace SIAPI\Negotiation\Negotiator;

use Traversable;
use SIAPI\Negotiation\Guesser;
use SIAPI\Negotiation\Strategy;
use SIAPI\Negotiation\Negotiator;
use SIAPI\Negotiation\Header\Accept\Collection;

/**
 * Class Charset
 * @package SIAPI\Negotiation\Negotiator
 */
class Charset extends Negotiator implements Guesser
{
    /**
     * {@inheritdoc}
     */
    public function __construct(Traversable $collection, Strategy $strategy)
    {
        parent::__construct($collection, $strategy);
    }

    /**
     * {@inheritdoc}
     */
    public function guess(array $supported)
    {
        $found = null;
        foreach ($supported as $charset) {
            if ($this->collection->hasValue($charset)) {
                $found = $charset;
                break;
            }
        }

        if (!$found && $this->collection->hasAcceptAllTag()) {
            if (!empty($supported)) {
                $found = $supported[0];
            }
        }

        return $found;
    }
}
