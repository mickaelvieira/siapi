<?php

namespace SIAPI\Negotiation\Header\Accept\Values;

use SIAPI\Negotiation\Header\Accept\Values;

/**
 * Class Media
 * @package SIAPI\Negotiation\Header\Accept\Collection
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
     *
     */
    /**
     * @return string
     */
    protected function sort()
    {
        usort(
            $this->entities,
            function ($val1, $val2) {

                /**
                 * @var \SIAPI\Negotiation\Header\Accept\Value $val1
                 * @var \SIAPI\Negotiation\Header\Accept\Value $val2
                 */

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
        );

        $this->entities = array_reverse($this->entities);
    }
}
