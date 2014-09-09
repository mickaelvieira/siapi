<?php

namespace SIAPI\Negotiation;

use SIAPI\Http\Request\Header\AcceptBase;
use SIAPI\Http\Request\Header\Collection;

/**
 * Class Negotiator
 * @package SIAPI\Negotiation
 * @link http://www.w3.org/Protocols/rfc2616/rfc2616-sec14.html
 */
abstract class Negotiator
{

    const STAR = '*';

    /**
     * @var Collection;
     */
    protected $acceptedValues;

    /**
     * @param array $headers
     */
    public function __construct(array $headers)
    {
        $this->acceptedValues = $this->parseHeaderString(
            $this->getHeaderString($headers)
        );
    }

    /**
     * @return Collection
     */
    public function getAcceptedValues()
    {
        return $this->acceptedValues;
    }

    /**
     * @return string
     */
    abstract protected function getHeaderName();

    /**
     * @return string
     */
    abstract protected function getParsingRegex();

    /**
     * @param string $value
     * @return array
     */
    abstract protected function parseAcceptedValue($value);

    /**
     * @param array $headers
     * @return string
     */
    protected function getHeaderString(array $headers)
    {
        $name = $this->getHeaderName();
        return array_key_exists($name, $headers) ? $headers[$name] : '';
    }

    /**
     * @param $header
     * @return Collection
     */
    protected function parseHeaderString($header)
    {
        $accepts = [];

        $header = preg_replace("/\s/", "", $header);
        $values = explode(",", $header);

        foreach ($values as $value) {
            $accept = $this->parseAcceptedValue($value);
            if ($accept) {
                array_push($accepts, $accept);
            }
        }
        $accepts = $this->sortAcceptedValuesByQuality($accepts);

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
                return ($quality1 < $quality2) ? -1 : 1;
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
    /*private function compareValues($a, $b)
    {
        if ($a === self::STAR && $b !== self::STAR) {
            $result = 1;
        } elseif ($b === self::STAR && $a !== self::STAR) {
            $result = -1;
        } else {
            $result = 0;
        }
        return $result;
    }*/
}
