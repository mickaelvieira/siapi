<?php

namespace spec\SIAPI\Negotiation\Negotiator;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class LanguageSpec extends ObjectBehavior
{
    function let()
    {
        $headers = $this->getTestHeaders();
        $this->beConstructedWith($headers);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('SIAPI\Negotiation\Negotiator\Language');
    }

    function it_should_return_a_collection_of_accept_language_entities()
    {
        $this->getAcceptedValues()->shouldImplement('\Traversable');
        $this->getAcceptedValues()->shouldImplement('\IteratorAggregate');
        $this->getAcceptedValues()->shouldImplement('\Countable');
        $this->getAcceptedValues()->shouldHaveCount(3);
    }

    function it_should_an_collection_of_ordered_accept_language_entities()
    {
        $returned = array(
            0 => array('language' => 'da', 'quality' => 1),
            1 => array('language' => 'en-gb', 'quality' => 0.8),
            2 => array('language' => 'en', 'quality' => 0.5)
        );

        /**
         * @TODO this loop does not work
         */
        foreach ($this->getAcceptedValues() as $key => $value) {
            $values = $returned[$key];
            $value->language->shouldBeEqualTo($values['language']);
            $value->quality->shouldBeEqualTo($values['quality']);
        }
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
