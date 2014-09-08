<?php

namespace SIAPI\Negotiation;

use SIAPI\Entity\Http\Header\AcceptLanguage;
use SIAPI\Entity\Http\Header\Collection;

/**
 * Interface Negotiator
 */
abstract class Negotiator
{
    /**
     * @var Collection;
     */
    protected $acceptedValues;

    /**
     * @param array $headers
     */
    public function __construct(array $headers)
    {
        $this->parseHeaderString($this->getHeaderString($headers));
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
     */
    protected function parseHeaderString($header)
    {
        $accepts = array();

        $header = preg_replace("/\s/", "", $header);
        $values = explode(",", $header);

        foreach ($values as $value) {
            $accept = $this->parseAcceptedValue($value);
            if ($accept) {
                array_push($accepts, $accept);
            }
        }
        $accepts = $this->sortAcceptedValuesByQuality($accepts);

        $this->acceptedValues = new Collection($accepts);
    }

    /**
     * @param array
     * @return array
     */
    private function sortAcceptedValuesByQuality(array $accepts)
    {
        usort(
            $accepts,
            function (AcceptLanguage $value1, AcceptLanguage $value2) {

                $quality1 = $value1->quality;
                $quality2 = $value2->quality;

                if ($quality1 === $quality2) {
                    return 0;
                }
                return ($quality1 > $quality2) ? -1 : 1;
            }
        );

        return $accepts;
    }
}
