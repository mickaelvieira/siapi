<?php

namespace spec\SIAPI\Negotiation\Negotiator;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * Class LanguageSpec
 * @package spec\SIAPI\Negotiation\Negotiator
 */
class LanguageSpec extends ObjectBehavior
{
    /**
     * @param \SIAPI\Negotiation\Header\Accept\Collection\Language $collection
     * @param \SIAPI\Negotiation\Strategy\Language $strategy
     */
    function let($collection, $strategy)
    {
        $this->beConstructedWith($collection, $strategy);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('SIAPI\Negotiation\Negotiator\Language');
    }

    private function getTestHeaders()
    {
        return array(
            'Host' => 'localhost',
            'User-Agent' => 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:26.0) Gecko/20100101 Firefox/26.0',
            'Accept' => 'text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8',
            'Accept-Language' => 'da, en-gb;q=0.8, en;q=0.5',
            'Accept-Encoding' => 'gzip, deflate',
            'Referer' => 'http://localhost/siapi/',
            'Connection' => 'keep-alive',
            'Cache-Control' => 'max-age=0'
        );
    }
}
