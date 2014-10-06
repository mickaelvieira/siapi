<?php

namespace SIAPI\Negotiation\AcceptHeader\Values;

use SIAPI\Negotiation\AcceptHeader\Value;
use SIAPI\Negotiation\AcceptHeader\Values;

/**
 * Class Media
 * @package SIAPI\Negotiation\AcceptHeader\Collection
 */
class Media extends Values
{
    /**
     * {@inheritdoc}
     */
    protected $defaultValue = '*/*;q=1';

    /**
     * {@inheritdoc}
     */
    protected $entityType = 'Media';

    /**
     * {@inheritdoc}
     */
    protected function sortCallback(Value $val1, Value $val2)
    {
        $qua1 = $val1->getQuality();
        $qua2 = $val2->getQuality();

        if ($qua1 === $qua2) {

            $len1 = strlen((string)$val1);
            $len2 = strlen((string)$val2);

            if ($len1 === $len2) {
                $result = ($val1->getIndex() < $val2->getIndex()) ? 1 : -1;
            } elseif ($len1 < $len2) {
                $result = -1;
            } else {
                $result = 1;
            }
        } elseif ($qua1 < $qua2) {
            $result = -1;
        } else {
            $result = 1;
        }
        return $result;
    }
}
