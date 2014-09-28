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
            function ($ent1, $ent2) {

                /**
                 * @var \SIAPI\Negotiation\Header\Accept\Entity $ent1
                 * @var \SIAPI\Negotiation\Header\Accept\Entity $ent2
                 */

                $qua1 = $ent1->getQuality();
                $qua2 = $ent2->getQuality();

                if ($qua1 === $qua2) {

                    $len1 = strlen((string)$ent1);
                    $len2 = strlen((string)$ent2);

                    if ($len1 === $len2) {
                        $result = ($ent1->getIndex() < $ent2->getIndex()) ? 1 : -1;
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
