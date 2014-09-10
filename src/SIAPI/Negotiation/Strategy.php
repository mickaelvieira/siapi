<?php

namespace SIAPI\Negotiation;

use SIAPI\Negotiation\Header\Accept\Collection;

/**
 * Class Strategy
 * @package SIAPI\Negotiation
 */
abstract class Strategy
{

    const STAR = '*';

    /**
     * @return \SIAPI\Negotiation\Header\Accept\Collection
     * @param \SIAPI\Negotiation\Header\Accept\Collection
     */
    abstract public function select(Collection $collection);

    /**
     * @param string $val1
     * @param string $val2
     * @return int
     */
    protected function compareValues($val1, $val2)
    {
        if ($val1 === self::STAR && $val2 !== self::STAR) {
            $result = 1;
        } elseif ($val2 === self::STAR && $val1 !== self::STAR) {
            $result = -1;
        } else {
            $result = 0;
        }
        return $result;
    }
}
