<?php

namespace SIAPI\Negotiation;

use SIAPI\Collection\Collection;
use SIAPI\Http\Request\Header\AcceptBase;
use SIAPI\Http\Request\Header\ValueRange;

/**
 * Class Negotiator
 * @package SIAPI\Negotiation
 * @link http://www.w3.org/Protocols/rfc2616/rfc2616-sec14.html
 */
abstract class Negotiator
{
    /**
     * @var \SIAPI\Negotiation\Strategy
     */
    protected $strategy;

    /**
     * @var Collection;
     */
    protected $entities;

    /**
     * @param array $headers
     */
    public function __construct(array $headers)
    {
        $this->entities = $this->parseHeaderString(
            $this->getHeaderString($headers)
        );
    }

    /**
     * @param \SIAPI\Negotiation\Strategy $strategy
     */
    public function setStrategy(Strategy $strategy)
    {
        $this->strategy = $strategy;
    }

    /**
     * @return Collection
     */
    public function getEntities()
    {
        return $this->entities;
    }

    /**
     * @return string
     */
    abstract protected function getHeaderName();

    /**
     * @param string $value
     * @return array
     */
    abstract protected function getEntity($value);

    /**
     * @param array $headers
     * @return string
     */
    private function getHeaderString(array $headers)
    {
        $name = $this->getHeaderName();
        return array_key_exists($name, $headers) ? $headers[$name] : '';
    }

    /**
     * @param $header
     * @return Collection
     */
    private function parseHeaderString($header)
    {
        $accepts = [];

        $values = explode(",", preg_replace("/\s/", "", $header));

        foreach ($values as $value) {
            $accept = $this->getEntity($value);
            if ($accept) {
                array_push($accepts, $accept);
            }
        }

        //var_dump($accepts);

        //$accepts = $this->sortAcceptedValuesByQuality($accepts);

        return new Collection($accepts);
    }

    /**
     * @param array
     * @return array
     */
    private function sortAcceptedValuesByQuality(array $accepts)
    {
        usort(
            $accepts,
            function (AcceptBase $value1, AcceptBase $value2) {

                $quality1 = $value1->getQuality();
                $quality2 = $value2->getQuality();

                if ($quality1 === $quality2) {
                    return 0;
                }
                return ($quality1 > $quality2) ? -1 : 1;
            }
        );

        return $accepts;
    }

    /**
     * @param ValueRange $value1
     * @param ValueRange $value2
     * @return bool|int
     */
    /*private function compareTypes(ValueRange $value1, ValueRange $value2)
    {
        $a_count = count($a['params']);
        $b_count = count($b['params']);
        if ($a_count === $b_count) {
            if ($r = $this->compareValues($a['subtype'], $b['subtype'])) {
                return $r;
            } else {
                return $this->compareValues($a['type'], $b['type']);
            }
        } else {
            return $a_count < $b_count;
        }
    }*/

    /**
     * @param string $a
     * @param string $b
     * @return int
     */
    /*   return $result;
    }*/
}
