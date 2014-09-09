<?php

namespace SIAPI\Negotiation;

abstract class Strategy
{

    const STAR = '*';

    /**
     * @return mixed
     */
    abstract public function sort();

    /**
     * @param string $a
     * @param string $b
     * @return int
     */
    private function compareValues($a, $b)
    {
        if ($a === self::STAR && $b !== self::STAR) {
            $result = 1;
        } elseif ($b === self::STAR && $a !== self::STAR) {
            $result = -1;
        } else {
            $result = 0;
        }
        return $result;
    }
}
