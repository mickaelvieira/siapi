<?php

namespace SIAPI\Negotiation\Negotiator;

use SIAPI\Entity\Http\Request\Header\AcceptLanguage;
use SIAPI\Negotiation\Negotiator;

class Language extends Negotiator
{
    /**
     * {@inheritDoc}
     */
    protected function getHeaderName()
    {
        return 'Accept-Language';
    }

    /**
     * @param string $value
     * @return array
     */
    protected function parseAcceptedValue($value)
    {
        $accept = null;
        $regex = $this->getParsingRegex();

        if (preg_match($regex, $value, $matches)) {

            array_shift($matches);

            $accept = new AcceptLanguage();
            if (isset($matches[0])) {
                $accept->language = (string)$matches[0];
            }
            if (isset($matches[1])) {
                $accept->quality = (float)$matches[1];
            }
        }
        return $accept;
    }

    /**
     * {@inheritDoc}
     */
    protected function getParsingRegex()
    {
        return "/([^;]+)(?:[;])?(?:[q|level])?(?:[=])?([0-9\.]+)?/";
    }
}
